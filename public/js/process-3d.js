/* =========================================================================
   Ana səhifə — "İş prosesim" 3D vizualı (Three.js r128)
   TƏK kür + ətrafında 4 düyün (mərhələ) orbit halqasında. Bölmə sticky-dir;
   səhifə sürüşdükcə kür fırlanır, hər mərhələ önə gəldikcə həmin mərhələnin
   məlumat paneli açılır (crossfade) və progress nöqtəsi işıqlanır.

   Mobil (<768px) və ya WebGL/THREE yoxdursa: 3D işə düşmür, panellər sadə
   şaquli siyahı kimi göstərilir (CSS fallback).
   ========================================================================= */
(function () {
    'use strict';

    var BREAKPOINT = 769;
    var TWO_PI = Math.PI * 2;
    var STAGES = 4;

    var SPHERE_COLORS = [0x9fe870, 0x7acc4a, 0x5aad2e, 0x3d8a18];
    var CORE_COLOR = 0x9fe870;
    var RING_COLOR = 0x9fe870;

    // Ölçülər (böyük və aydın görünməsi üçün)
    var CORE_R = 1.95;
    var RING_R = 2.9;
    var NODE_R = 0.44;
    var FOV = 42;
    var TILT = 0.30;                  // kamera meyli (~17°) — orbit ellips görünsün
    var FIT_MARGIN = 0.4;            // kadr kənarı pay

    var canvas = document.getElementById('process-canvas');
    if (!canvas) return;

    var section = canvas.closest('.hx-proc2');
    var track = section ? section.querySelector('.hx-proc2-track') : null;
    var panels = section ? section.querySelectorAll('.hx-proc2-panel') : [];
    var dots = section ? section.querySelectorAll('.hx-proc2-dot') : [];

    var reduceMotion = window.matchMedia &&
        window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    var inited = false;
    var initRetries = 0;
    var renderer, scene, camera, group, coreSphere;
    var nodes = [];                 // { mesh, color }
    var whiteColor;
    var currentR = 0;               // hamar fırlanma üçün cari bucaq
    var activeIndex = -1;
    var bobPhase = 0;

    /* ---- progress: track-ın viewport üzrə nə qədər keçdiyi (0..1) ---- */
    function getProgress() {
        if (!track) return 0;
        var rect = track.getBoundingClientRect();
        var scrollable = track.offsetHeight - window.innerHeight;
        if (scrollable <= 0) return 0;
        var p = -rect.top / scrollable;
        return p < 0 ? 0 : (p > 1 ? 1 : p);
    }

    function sizeOf() {
        return {
            w: canvas.clientWidth || canvas.parentElement.clientWidth,
            h: canvas.clientHeight || 420
        };
    }

    /* Kameranı canvas nisbətinə görə yerləşdir — kür böyük görünsün, halqa və
       düyünlər isə kadrdan çıxmasın. Şaquli/üfüqi extent ayrıca hesablanır. */
    function frameCamera(aspect) {
        var vHalf = (FOV * Math.PI / 180) / 2;
        var hHalf = Math.atan(Math.tan(vHalf) * aspect);
        var vExt = CORE_R + 0.45;             // şaquli ~ kür (+ aktiv düyün payı)
        var hExt = RING_R + NODE_R + 0.25;    // üfüqi ~ halqa + düyün
        var distV = vExt / Math.tan(vHalf);
        var distH = hExt / Math.tan(hHalf);
        var dist = Math.max(distV, distH) * (1 + FIT_MARGIN * 0.05);
        camera.position.set(0, dist * Math.sin(TILT), dist * Math.cos(TILT));
        camera.lookAt(0, 0, 0);
    }

    function init() {
        if (typeof THREE === 'undefined' || !track) return false;

        // WebGL dəstəyini yoxla
        try {
            var test = document.createElement('canvas');
            if (!(test.getContext('webgl') || test.getContext('experimental-webgl'))) return false;
        } catch (e) { return false; }

        // ÖNƏMLİ: canvas baza CSS-də display:none-dur. Ölçünü düzgün oxumaq üçün
        // əvvəlcə js-3d əlavə edirik ki, canvas görünsün və real en/hündürlük versin.
        section.classList.add('js-3d');

        var s = sizeOf();
        if (!s.w || !s.h) {
            // Layout hələ hazır deyil (məs. şriftlər/şəkil yüklənir) — sonra yenidən cəhd et
            section.classList.remove('js-3d');
            if (initRetries++ < 30) requestAnimationFrame(function () { if (!inited) init(); });
            return false;
        }

        whiteColor = new THREE.Color(0xffffff);

        try {
            renderer = new THREE.WebGLRenderer({ canvas: canvas, antialias: true, alpha: true });
        } catch (e) {
            section.classList.remove('js-3d'); // WebGL alınmadı — sadə siyahıya qayıt
            return false;
        }
        renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
        renderer.setSize(s.w, s.h, false);
        renderer.setClearColor(0x000000, 0);

        scene = new THREE.Scene();
        camera = new THREE.PerspectiveCamera(FOV, s.w / s.h, 0.1, 100);
        frameCamera(s.w / s.h);

        // İşıqlar
        scene.add(new THREE.AmbientLight(0xffffff, 0.6));
        var key = new THREE.PointLight(0xffffff, 1.0);
        key.position.set(4, 7, 8);
        scene.add(key);
        var fill = new THREE.DirectionalLight(0xffffff, 0.4);
        fill.position.set(-6, -2, 4);
        scene.add(fill);

        group = new THREE.Group();
        scene.add(group);

        // Mərkəzi kür
        var coreGeo = new THREE.SphereGeometry(CORE_R, 64, 64);
        var coreMat = new THREE.MeshPhongMaterial({
            color: CORE_COLOR, shininess: 80, specular: 0x2a4a1a,
            emissive: 0x18330e, emissiveIntensity: 0.3
        });
        coreSphere = new THREE.Mesh(coreGeo, coreMat);
        group.add(coreSphere);

        // Orbit halqası
        var ringGeo = new THREE.TorusGeometry(RING_R, 0.035, 16, 140);
        var ringMat = new THREE.MeshBasicMaterial({ color: RING_COLOR, transparent: true, opacity: 0.45 });
        var ring = new THREE.Mesh(ringGeo, ringMat);
        ring.rotation.x = Math.PI / 2; // ekvator müstəvisi (XZ)
        group.add(ring);

        // 4 düyün — halqa üzərində. Düyün i, öz kvartalının mərkəzində önə gəlir.
        var nodeGeo = new THREE.SphereGeometry(NODE_R, 32, 32);
        for (var i = 0; i < STAGES; i++) {
            var phi = -((i + 0.5) * (Math.PI / 2));   // R=(i+0.5)*90° olanda önə düşür
            var col = new THREE.Color(SPHERE_COLORS[i]);
            var mat = new THREE.MeshPhongMaterial({
                color: col.clone(), shininess: 90, emissive: col.clone(), emissiveIntensity: 0
            });
            var m = new THREE.Mesh(nodeGeo, mat);
            m.position.set(RING_R * Math.sin(phi), 0, RING_R * Math.cos(phi));
            m.userData = { baseColor: col, scale: 1 };
            group.add(m);
            nodes.push(m);
        }

        bindUI();
        window.addEventListener('resize', onResize);
        inited = true;
        requestAnimationFrame(animate);
        return true;
    }

    function bindUI() {
        for (var i = 0; i < dots.length; i++) {
            (function (idx) {
                dots[idx].addEventListener('click', function () {
                    if (!track) return;
                    var scrollable = track.offsetHeight - window.innerHeight;
                    var targetP = (idx + 0.5) / STAGES;
                    var top = window.scrollY + track.getBoundingClientRect().top + targetP * scrollable;
                    window.scrollTo({ top: top, behavior: reduceMotion ? 'auto' : 'smooth' });
                });
            })(i);
        }
    }

    function onResize() {
        if (!inited) return;
        // mobilə keçdikdə 3D söndürülür (CSS), sadəcə render dayanır
        var s = sizeOf();
        if (s.w === 0) return;
        camera.aspect = s.w / s.h;
        camera.updateProjectionMatrix();
        frameCamera(s.w / s.h);
        renderer.setSize(s.w, s.h, false);
    }

    function setActive(idx) {
        if (idx === activeIndex) return;
        activeIndex = idx;
        var i;
        for (i = 0; i < panels.length; i++) {
            panels[i].classList.toggle('is-active', i === idx);
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].classList.toggle('is-active', i === idx);
        }
    }

    function animate() {
        if (!inited) return;

        // Mobil/gizli olduqda render etmə
        if (window.innerWidth < BREAKPOINT || canvas.offsetParent === null) {
            requestAnimationFrame(animate);
            return;
        }

        var p = getProgress();
        var targetR = p * TWO_PI;

        // Hamar fırlanma
        if (reduceMotion) {
            currentR = targetR;
        } else {
            currentR += (targetR - currentR) * 0.12;
        }
        group.rotation.y = currentR;

        // Yüngül "nəfəs alma" hərəkəti (fırlanmanı pozmur)
        if (!reduceMotion) {
            bobPhase += 0.02;
            group.position.y = Math.sin(bobPhase) * 0.08;
        }

        // Aktiv mərhələ
        var idx = Math.floor(p * STAGES);
        if (idx > STAGES - 1) idx = STAGES - 1;
        if (idx < 0) idx = 0;
        setActive(idx);

        // Düyünlərin vurğusu (aktiv olan böyüyür və işıqlanır)
        for (var i = 0; i < nodes.length; i++) {
            var n = nodes[i];
            var isActive = (i === idx);
            var targetScale = isActive ? 1.55 : 1;
            n.userData.scale += (targetScale - n.userData.scale) * 0.15;
            n.scale.setScalar(n.userData.scale);

            var targetEmissive = isActive ? 0.7 : 0;
            n.material.emissiveIntensity += (targetEmissive - n.material.emissiveIntensity) * 0.15;

            var targetColor = isActive ? whiteColor : n.userData.baseColor;
            n.material.color.lerp(targetColor, 0.12);
        }

        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    }

    /* ---- Başlatma: yalnız desktop. Böyüməyə də reaksiya ver. ---- */
    function ensureInit() {
        if (inited) { onResize(); return; }
        if (window.innerWidth < BREAKPOINT) return;
        init();
    }

    window.addEventListener('resize', ensureInit);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', ensureInit);
    } else {
        ensureInit();
    }
})();
