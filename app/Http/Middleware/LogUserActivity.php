<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class LogUserActivity
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }

    public function terminate(Request $request, $response)
    {
        if (preg_match('/\.(css|js|jpg|jpeg|png|gif|ico|svg|woff|woff2|ttf|eot)$/i', $request->path())) {
            return;
        }

        $agent = new Agent();

        // Mengambil info perangkat secara mendetail
        $device = $agent->device(); // Contoh: iPhone, Nexus, Asus
        $platform = $agent->platform(); // Contoh: Windows, OS X, AndroidOS
        $browser = $agent->browser(); // Contoh: Chrome, Safari, Firefox

        // Merangkai nama perangkat agar enak dibaca
        $deviceInfo = $platform . ' - ' . $browser;
        if ($agent->isMobile() || $agent->isTablet()) {
            $deviceInfo = $device . ' (' . $platform . ') - ' . $browser;
        }

        $user = Auth::check() ? Auth::user()->name : 'Guest';
        $ip = $request->ip();
        $routeName = $request->route() ? $request->route()->getName() : null;
        $aktivitas = $this->terjemahkanRoute($routeName, $request->path());

        $message = "Log MyBolo Profile\n";
        $message .= "User: {$user}\n";
        $message .= "Perangkat: {$deviceInfo}\n"; // Hasil: Windows - Chrome atau iPhone (iOS) - Safari
        $message .= "Aktivitas: {$aktivitas}\n";
        $message .= "IP Address: {$ip}\n";

        $this->sendToTelegram($message);
    }

    private function terjemahkanRoute($routeName, $path)
    {
        if (!$routeName) return "Mengakses: /" . $path;

        $kamus = [
            // Public Routes
            'home' => 'Melihat Halaman Utama (Landing Page)',
            'testimonial.create' => 'Membuka Halaman Form Testimoni',
            'testimonial.store' => 'Mengirimkan Testimoni Baru (Menunggu Persetujuan)',

            // Auth
            'login' => 'Melihat Halaman Login Admin',
            'login.post' => 'Mencoba Login ke Sistem',
            'logout' => 'Keluar dari Sistem Admin',

            // Admin Area
            'admin.dashboard' => 'Membuka Dashboard Admin',
            'hero.index' => 'Mengelola Slider Hero',
            'services.index' => 'Mengelola Layanan (Services)',
            'partners.index' => 'Mengelola Partner',
            'teams.index' => 'Mengelola Data Team',
            'settings.index' => 'Membuka Pengaturan Website',
            'testimonials.index' => 'Manajemen Testimoni (ACC/Hapus)',
            'testimonials.updateStatus' => 'Mengubah Status Publikasi Testimoni',
        ];

        return $kamus[$routeName] ?? "Akses Route: " . $routeName;
    }

    private function sendToTelegram($message)
    {
        $token = env('TELEGRAM_ADMIN_BOT_TOKEN');
        $chatId = env('TELEGRAM_ADMIN_CHAT_ID');

        \Log::info("Mencoba kirim ke Telegram..."); // Tambahkan ini

        try {
            $response = Http::timeout(10)->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'Markdown'
            ]);

            if (!$response->successful()) {
                \Log::error("Gagal kirim: " . $response->body());
            } else {
                \Log::info("Pesan berhasil terkirim!");
            }
        } catch (\Exception $e) {
            \Log::error("Error Telegram: " . $e->getMessage());
        }
    }
}
