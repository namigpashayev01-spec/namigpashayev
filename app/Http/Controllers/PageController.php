<?php

namespace App\Http\Controllers;

use App\Support\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Ana səhifə.
     */
    public function home()
    {
        return view('pages.home', [
            // Ana səhifədə göstərmək üçün ən son 3 məqalə.
            'posts' => array_slice(Blog::all(), 0, 3),
            'seo' => [
                'title'       => 'Namig Pashayev — Rəqəmsal Marketinq üzrə Mütəxəssis',
                'description' => 'Rəqəmsal marketinq üzrə mütəxəssis Namig Pashayev. SEO, SMM, Google Ads və rəqəmsal strategiya ilə biznesinizi onlayn böyüdün.',
                'canonical'   => route('home'),
                'keywords'    => 'rəqəmsal marketinq, dijital marketinq, SEO mütəxəssisi, SMM, Google Ads, marketinq Bakı, Namig Pashayev',
            ],
        ]);
    }

    /**
     * Xidmətlər səhifəsi.
     */
    public function services()
    {
        return view('pages.services', [
            'seo' => [
                'title'       => 'Xidmətlər — SEO, SMM, Google Ads | Namig Pashayev',
                'description' => 'Təklif etdiyim rəqəmsal marketinq xidmətləri: SEO optimizasiyası, sosial media idarəetməsi (SMM), Google Ads reklamları və marketinq strategiyası.',
                'canonical'   => route('services'),
                'keywords'    => 'SEO xidməti, SMM xidməti, Google Ads, kontekst reklam, marketinq strategiyası',
                'breadcrumbs' => [
                    ['name' => 'Ana səhifə', 'url' => route('home')],
                    ['name' => 'Xidmətlər',  'url' => route('services')],
                ],
            ],
        ]);
    }

    /**
     * Haqqımda səhifəsi.
     */
    public function about()
    {
        return view('pages.about', [
            'seo' => [
                'title'       => 'Haqqımda — Namig Pashayev | Rəqəmsal Marketinq Mütəxəssisi',
                'description' => 'Namig Pashayev kimdir? Rəqəmsal marketinq sahəsindəki təcrübəm, peşəkar yolum, bacarıqlarım və yanaşmam haqqında.',
                'canonical'   => route('about'),
                'keywords'    => 'Namig Pashayev haqqında, marketinq mütəxəssisi, təcrübə, bacarıqlar',
                'breadcrumbs' => [
                    ['name' => 'Ana səhifə', 'url' => route('home')],
                    ['name' => 'Haqqımda',   'url' => route('about')],
                ],
            ],
        ]);
    }

    /**
     * Kurs səhifəsi.
     */
    public function course()
    {
        return view('pages.course', [
            'seo' => [
                'title'       => 'Kurslar — Namig Pashayev | Digital Marketing Academy',
                'description' => 'Google Tag Manager, GA4, Google Ads, Meta Ads, TikTok Ads, SEO, AI Automation və No Code AI Developer kursları. Praktiki tapşırıqlar, real layihələr və sertifikat.',
                'canonical'   => route('course'),
                'keywords'    => 'rəqəmsal marketinq kursu, GTM kursu, GA4, Google Ads kursu, Meta Ads, TikTok Ads, SEO kursu, AI Automation, digital marketing academy',
                'breadcrumbs' => [
                    ['name' => 'Ana səhifə', 'url' => route('home')],
                    ['name' => 'Kurslar',    'url' => route('course')],
                ],
            ],
        ]);
    }

    /**
     * Kursa qeydiyyat formasının serverdə işlənməsi (backend).
     */
    public function registerCourse(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'string', 'max:120'],
            'phone'    => ['required', 'string', 'max:40'],
            'email'    => ['nullable', 'email', 'max:160'],
            'course'   => ['required', 'string', 'max:120'],
            'format'   => ['required', 'string', 'max:60'],
            'location' => ['nullable', 'string', 'max:40'],
            'note'     => ['nullable', 'string', 'max:2000'],
        ], [
            'name.required'   => 'Zəhmət olmasa ad və soyadınızı yazın.',
            'phone.required'  => 'Zəhmət olmasa telefon nömrənizi yazın.',
            'email.email'     => 'E-poçt ünvanı düzgün deyil.',
            'course.required' => 'Zəhmət olmasa kurs seçin.',
            'format.required' => 'Zəhmət olmasa tədris formatını seçin.',
        ]);

        // Qeydiyyatı log faylına yazırıq. (Sonradan verilənlər bazasına və ya
        // admin panelə yönləndirmək üçün yalnız bu hissəni dəyişmək kifayətdir.)
        logger()->info('Yeni kurs qeydiyyatı', $data);

        return redirect()
            ->route('course')
            ->withFragment('qeydiyyat')
            ->with('success', 'Təşəkkürlər, '.$data['name'].'! Qeydiyyatınız qəbul edildi. 24 saat ərzində sizinlə əlaqə saxlayacağıq.');
    }

    /**
     * Bloq — məqalələr siyahısı (başlıq/kateqoriya üzrə axtarışla).
     */
    public function blog(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $posts = Blog::all();
        if ($q !== '') {
            $needle = mb_strtolower($q);
            $posts = array_values(array_filter($posts, function ($post) use ($needle) {
                return mb_strpos(mb_strtolower($post['title']), $needle) !== false
                    || mb_strpos(mb_strtolower($post['category']), $needle) !== false;
            }));
        }

        return view('pages.blog', [
            'posts' => $posts,
            'q'     => $q,
            'seo'   => [
                'title'       => 'Bloq — Rəqəmsal Marketinq Məqalələri | Namig Pashayev',
                'description' => 'Rəqəmsal marketinq, SEO, SMM və Google Ads üzrə faydalı məqalələr, məsləhətlər və ən son trendlər.',
                'canonical'   => route('blog'),
                'keywords'    => 'marketinq bloqu, SEO məqalələr, SMM məsləhətləri, rəqəmsal marketinq trendləri',
                'breadcrumbs' => [
                    ['name' => 'Ana səhifə', 'url' => route('home')],
                    ['name' => 'Bloq',       'url' => route('blog')],
                ],
            ],
        ]);
    }

    /**
     * Bloq — tək məqalə (SEO üçün ayrıca URL + Article struktur datası).
     */
    public function blogShow(string $slug)
    {
        $post = Blog::find($slug);

        abort_if($post === null, 404);

        return view('pages.blog-show', [
            'post' => $post,
            'seo'  => [
                'title'       => $post['title'].' | Namig Pashayev',
                'description' => $post['excerpt'],
                'canonical'   => route('blog.show', $post['slug']),
                'og_type'     => 'article',
                'keywords'    => $post['category'].', rəqəmsal marketinq, '.$post['title'],
                'breadcrumbs' => [
                    ['name' => 'Ana səhifə', 'url' => route('home')],
                    ['name' => 'Bloq',       'url' => route('blog')],
                    ['name' => $post['title'], 'url' => route('blog.show', $post['slug'])],
                ],
            ],
        ]);
    }

    /**
     * Əlaqə səhifəsi.
     */
    public function contact()
    {
        return view('pages.contact', [
            'seo' => [
                'title'       => 'Əlaqə — Namig Pashayev | Rəqəmsal Marketinq Mütəxəssisi',
                'description' => 'Layihəniz üçün mənimlə əlaqə saxlayın. Rəqəmsal marketinq, SEO və reklam üzrə pulsuz ilkin konsultasiya.',
                'canonical'   => route('contact'),
                'keywords'    => 'marketinq mütəxəssisi ilə əlaqə, konsultasiya, SEO sifariş',
                'breadcrumbs' => [
                    ['name' => 'Ana səhifə', 'url' => route('home')],
                    ['name' => 'Əlaqə',      'url' => route('contact')],
                ],
            ],
        ]);
    }

    /**
     * Əlaqə formasının serverdə işlənməsi (backend).
     */
    public function sendContact(Request $request)
    {
        $data = $request->validate([
            'name'    => ['required', 'string', 'max:120'],
            'email'   => ['required', 'email', 'max:160'],
            'message' => ['required', 'string', 'max:3000'],
        ], [
            'name.required'    => 'Zəhmət olmasa adınızı yazın.',
            'email.required'   => 'Zəhmət olmasa e-poçtunuzu yazın.',
            'email.email'      => 'E-poçt ünvanı düzgün deyil.',
            'message.required' => 'Mesaj boş ola bilməz.',
        ]);

        // Burada mesajı e-poçtla göndərə və ya bazaya yaza bilərsiniz.
        // Nümunə üçün log faylına yazırıq:
        logger()->info('Yeni əlaqə mesajı', $data);

        return redirect()
            ->route('contact')
            ->with('success', 'Təşəkkürlər, '.$data['name'].'! Mesajınız göndərildi. Tezliklə sizinlə əlaqə saxlayacam.');
    }

    /**
     * Qiymət təklifi (modal) formasının serverdə işlənməsi.
     * Modal bütün səhifələrdə olduğu üçün cavab geri (back) qaytarılır;
     * səhvlər ayrıca "quote" error bag-ında saxlanır ki, əlaqə forması ilə
     * qarışmasın və modal yenidən açıla bilsin.
     */
    public function sendQuote(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'q_name'    => ['required', 'string', 'max:120'],
            'q_email'   => ['required', 'email', 'max:160'],
            'q_phone'   => ['nullable', 'string', 'max:40'],
            'q_service' => ['required', 'string', 'max:120'],
            'q_budget'  => ['nullable', 'string', 'max:60'],
            'q_message' => ['required', 'string', 'max:3000'],
        ], [
            'q_name.required'    => 'Zəhmət olmasa ad və soyadınızı yazın.',
            'q_email.required'   => 'Zəhmət olmasa e-poçtunuzu yazın.',
            'q_email.email'      => 'E-poçt ünvanı düzgün deyil.',
            'q_service.required' => 'Zəhmət olmasa maraqlandığınız xidməti seçin.',
            'q_message.required' => 'Layihə haqqında qısa məlumat yazın.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'quote')
                ->withInput();
        }

        $data = $validator->validated();

        // Sorğunu log faylına yazırıq. (Sonradan e-poçt və ya bazaya yönləndirmək
        // üçün yalnız bu hissəni dəyişmək kifayətdir.)
        logger()->info('Yeni qiymət təklifi sorğusu', $data);

        return back()
            ->with('quote_success', 'Təşəkkürlər, '.$data['q_name'].'! Qiymət təklifi sorğunuz göndərildi. 24 saat ərzində sizinlə əlaqə saxlayacağam.');
    }

    /**
     * Lead magnet (pulsuz material) — e-poçt toplama.
     * Səhvlər ayrıca "lead" bag-ında saxlanır; uğurda eyni səhifəyə qayıdılır.
     */
    public function subscribeLead(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lead_name'  => ['nullable', 'string', 'max:120'],
            'lead_email' => ['required', 'email', 'max:160'],
        ], [
            'lead_email.required' => 'Zəhmət olmasa e-poçtunuzu yazın.',
            'lead_email.email'    => 'E-poçt ünvanı düzgün deyil.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'lead')->withInput()->withFragment('material');
        }

        $data = $validator->validated();

        // Lead-i log faylına yazırıq. (Sonradan Mailchimp/e-poçt siyahısına və ya
        // bazaya yönləndirmək üçün yalnız bu hissəni dəyişmək kifayətdir.)
        logger()->info('Yeni lead (pulsuz material)', $data);

        return back()
            ->with('lead_success', 'Təşəkkürlər! Checklist-i tezliklə e-poçtunuza göndərəcəyik.')
            ->withFragment('material');
    }
}
