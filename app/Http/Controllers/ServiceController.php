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
            'title' => 'required',
            'icon' => 'required',
            'short_description' => 'required',
            'image_path' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $request->file('image_path')->store('services', 'public');

        DB::table('services')->insert([
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'features' => json_encode($request->features),
            'wa_link' => $request->wa_link,
            'image_path' => $path,
            'created_at' => now(),
        ]);

        return back()->with('success', 'Layanan berhasil disimpan!');
    }

    public function update(Request $request, $id)
    {
        $service = DB::table('services')->where('id', $id)->first();

        $updateData = [
            'title' => $request->title,
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'features' => json_encode($request->features),
            'wa_link' => $request->wa_link,
            'updated_at' => now()
        ];

        if ($request->hasFile('image_path')) {
            Storage::disk('public')->delete($service->image_path);
            $updateData['image_path'] = $request->file('image_path')->store('services', 'public');
        }

        DB::table('services')->where('id', $id)->update($updateData);
        return back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $service = DB::table('services')->where('id', $id)->first();
        Storage::disk('public')->delete($service->image_path);
        DB::table('services')->where('id', $id)->delete();
        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}
