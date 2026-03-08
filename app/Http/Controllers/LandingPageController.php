<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil data hero slider dari database
        $sliders = DB::table('hero_sliders')->orderBy('id', 'asc')->get();

        $services = DB::table('services')->get();

        // Hanya mengambil testimoni yang sudah disetujui (opsional, sesuaikan dengan logic status Anda)
        $testimonials = DB::table('testimonials')->where('status', 'approved')->get();

        $partners = DB::table('partners')->get();

        $teams = DB::table('teams')->get();

        // Mengambil data setting (alamat, email, telp)
        $settings = DB::table('settings')->pluck('value', 'key');

        // Pastikan $sliders dimasukkan ke dalam compact agar bisa dibaca oleh file blade
        return view('company_profile', compact('sliders', 'services', 'testimonials', 'partners', 'teams', 'settings'));
    }
}
