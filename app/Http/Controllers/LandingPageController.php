<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // $sliders = DB::table('hero_sliders')->where('is_active', 1)->orderBy('order')->get();
        $services = DB::table('services')->get();
        $testimonials = DB::table('testimonials')->get();
        $partners = DB::table('partners')->where('is_active', 1)->orderBy('order')->get();
        $teams = DB::table('teams')->get();

        // Mengambil data setting (alamat, email, telp)
        $settings = DB::table('settings')->pluck('value', 'key');

        return view('company_profile', compact('services', 'testimonials', 'partners', 'teams', 'settings'));
    }
}
