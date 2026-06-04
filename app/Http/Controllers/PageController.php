<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Ana səhifə.
     */
    public function home()
    {
        return view('pages.home', [
            'seo' => [
                'title'       => 'Namig Pashayev — Şəxsi Portfolio Saytı',
                'description' => 'Namig Pashayevin rəsmi şəxsi saytı. Təcrübə, xidmətlər və əlaqə məlumatları bir yerdə.',
                'canonical'   => route('home'),
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
                'title'       => 'Haqqımda — Namig Pashayev',
                'description' => 'Namig Pashayev kimdir? Təcrübəm, peşəkar yolum və dəyərlərim haqqında.',
                'canonical'   => route('about'),
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
                'title'       => 'Xidmətlər — Namig Pashayev',
                'description' => 'Təklif etdiyim peşəkar xidmətlərin tam siyahısı və təsviri.',
                'canonical'   => route('services'),
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
                'title'       => 'Əlaqə — Namig Pashayev',
                'description' => 'Mənimlə əlaqə saxlayın. E-poçt və əlaqə forması.',
                'canonical'   => route('contact'),
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
            ->with('success', 'Təşəkkürlər, '.$data['name'].'! Mesajınız göndərildi.');
    }
}
