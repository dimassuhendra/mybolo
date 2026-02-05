<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = DB::table('services')->get();
        return view('admin.services', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'icon'              => 'required|string', // Contoh: fa-laptop
            'short_description' => 'required',
            'image_path'        => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'file_path'         => 'nullable|url', // Validasi link YouTube
        ]);

        // Upload Gambar
        $path = $request->file('image_path')->store('services', 'public');

        DB::table('services')->insert([
            'title'             => $request->title,
            'icon'              => $request->icon,
            'short_description' => $request->short_description,
            'features'          => json_encode($request->features), // Pastikan fitur berupa array dari form
            'wa_link'           => $request->wa_link,
            'image_path'        => $path,
            'file_path'         => $request->file_path, // Link YouTube
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return back()->with('success', 'Layanan berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $service = DB::table('services')->where('id', $id)->first();

        $request->validate([
            'title'             => 'required|string|max:255',
            'icon'              => 'required|string',
            'short_description' => 'required',
            'image_path'        => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'file_path'         => 'nullable|url',
        ]);

        $updateData = [
            'title'             => $request->title,
            'icon'              => $request->icon,
            'short_description' => $request->short_description,
            'features'          => json_encode($request->features),
            'wa_link'           => $request->wa_link,
            'file_path'         => $request->file_path,
            'updated_at'        => now()
        ];

        // Jika user mengganti gambar
        if ($request->hasFile('image_path')) {
            // Hapus gambar lama dari storage
            if ($service->image_path) {
                Storage::disk('public')->delete($service->image_path);
            }
            // Simpan gambar baru
            $updateData['image_path'] = $request->file('image_path')->store('services', 'public');
        }

        DB::table('services')->where('id', $id)->update($updateData);

        return back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = DB::table('services')->where('id', $id)->first();

        // Hapus file gambar dari storage sebelum datanya dihapus di DB
        if ($service && $service->image_path) {
            Storage::disk('public')->delete($service->image_path);
        }

        DB::table('services')->where('id', $id)->delete();

        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}
