<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil statistik jumlah data dari setiap tabel sesuai file SQL
        $stats = [
            'sliders'      => DB::table('hero_sliders')->count(),
            'services'     => DB::table('services')->count(),
            'testimonials' => DB::table('testimonials')->count(),
            'partners'     => DB::table('partners')->count(),
            'teams'        => DB::table('teams')->count(),
            'settings'     => DB::table('settings')->count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
