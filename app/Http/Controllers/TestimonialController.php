<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = DB::table('testimonials')->latest()->get();
        return view('admin.testimonials', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'body' => 'required',
            'stars' => 'required|integer|min:1|max:5',
        ]);

        DB::table('testimonials')->insert([
            'client_name' => $request->client_name,
            'position'    => $request->position,
            'body'        => $request->body,
            'stars'       => $request->stars,
            'status'      => $request->status ?? 'approved',
            'is_featured' => $request->has('is_featured'),
            'source'      => 'internal',
            'created_at'  => now(),
        ]);

        return back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        DB::table('testimonials')->where('id', $id)->update([
            'client_name' => $request->client_name,
            'position'    => $request->position,
            'body'        => $request->body,
            'stars'       => $request->stars,
            'status'      => $request->status,
            'is_featured' => $request->has('is_featured'),
            'updated_at'  => now(),
        ]);

        return back()->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('testimonials')->where('id', $id)->update([
            'status' => $request->status,
            'updated_at' => now(),
        ]);
        return back()->with('success', 'Status testimoni diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('testimonials')->where('id', $id)->delete();
        return back()->with('success', 'Testimoni berhasil dihapus!');
    }
}
