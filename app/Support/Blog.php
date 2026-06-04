<?php

namespace App\Support;

/**
 * Bloq məqalələrinin sadə məlumat mənbəyi.
 *
 * Hazırda məqalələr bu fayl içində massiv kimi saxlanılır (verilənlər bazası
 * tələb olunmur). Sonradan DB-yə keçmək istəsəniz, yalnız bu sinfin metodlarını
 * dəyişmək kifayətdir — controller və view-lar olduğu kimi qalır.
 */
class Blog
{
    /**
     * Bütün məqalələr (ən yenidən köhnəyə).
     *
     * @return array<int, array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            [
                'slug'     => 'seo-nedir-2025',
                'title'    => 'SEO nədir və 2025-ci ildə nələrə diqqət etməli?',
                'excerpt'  => 'Axtarış sistemlərində üst sıralara çıxmağın əsasları: açar söz araşdırması, texniki SEO və keyfiyyətli məzmun.',
                'category' => 'SEO',
                'date'     => '2025-11-18',
                'read'     => 6,
                'body'     => [
                    'SEO (Search Engine Optimization) — saytınızın Google və digər axtarış sistemlərində daha yuxarı sıralarda görünməsi üçün edilən optimizasiya işlərinin məcmusudur.',
                    'Texniki SEO sayt sürətini, mobil uyğunluğu və indekslənməni əhatə edir. Məzmun SEO-su isə istifadəçinin axtardığı suala dəyərli cavab verməyə fokuslanır.',
                    '2025-ci ildə ən vacib amillər: istifadəçi təcrübəsi (Core Web Vitals), E-E-A-T prinsipləri və niyyət əsaslı açar söz strategiyasıdır.',
                ],
            ],
            [
                'slug'     => 'google-ads-budce-optimizasiyasi',
                'title'    => 'Google Ads büdcəsini necə optimallaşdırmalı?',
                'excerpt'  => 'Reklam büdcənizi sərf etmədən daha çox satış əldə etmək üçün praktiki addımlar və kampaniya strukturu.',
                'category' => 'Google Ads',
                'date'     => '2025-10-05',
                'read'     => 5,
                'body'     => [
                    'Google Ads-da uğur büdcənin böyüklüyündən deyil, düzgün strukturdan asılıdır. Kampaniyaları məhsul/xidmət üzrə ayırmaq idarəetməni asanlaşdırır.',
                    'Mənfi açar sözlər (negative keywords) lazımsız klikləri azaldaraq büdcəni qoruyur. Konversiya izləməsi qurulmadan optimizasiya mümkün deyil.',
                    'Hər həftə axtarış termini hesabatını yoxlayın və effektiv olmayan açar sözləri dayandırın.',
                ],
            ],
            [
                'slug'     => 'sosial-media-strategiyasi',
                'title'    => 'Kiçik biznes üçün sosial media strategiyası',
                'excerpt'  => 'Instagram və Facebook-da auditoriya qurmaq, məzmun planı hazırlamaq və satışa çevirmək.',
                'category' => 'SMM',
                'date'     => '2025-09-12',
                'read'     => 7,
                'body'     => [
                    'Sosial media strategiyası hədəf auditoriyanı tanımaqla başlayır. Kimə, hansı problem üçün, hansı dildə müraciət etdiyinizi bilməlisiniz.',
                    'Məzmun planı (content plan) ardıcıllığı təmin edir: tədris, satış, etibar və əyləncə formatlarını balanslı şəkildə paylaşın.',
                    'Nəticəni ölçün — çatdırılma, qarşılıqlı əlaqə və ən əsası saytınıza yönləndirilən trafik və satışlar.',
                ],
            ],
        ];
    }

    /**
     * Slug-a görə tək məqaləni tapır.
     */
    public static function find(string $slug): ?array
    {
        foreach (self::all() as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }

        return null;
    }
}
