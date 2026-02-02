<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicTestimonialController extends Controller
{
    public function create()
    {
        return view('public.testimonial-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'email'       => 'required|email',
            'position'    => 'nullable|string|max:255',
            'body'        => 'required|string|min:10',
            'stars'       => 'required|integer|min:1|max:5',
        ]);

        DB::table('testimonials')->insert([
            'client_name' => $request->client_name,
            'email'       => $request->email,
            'position'    => $request->position,
            'body'        => $request->body,
            'stars'       => $request->stars,
            'status'      => 'pending',
            'source'      => 'public', 
            'is_featured' => false,
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        return back()->with('success', 'Terima kasih! Testimoni Anda telah terkirim dan akan ditinjau oleh tim kami.');
    }
}
