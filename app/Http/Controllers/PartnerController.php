<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = DB::table('partners')->latest()->get();
        return view('admin.partners', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo_path' => 'required|image|max:1024',
        ]);

        $path = $request->file('logo_path')->store('partners', 'public');

        DB::table('partners')->insert([
            'name' => $request->name,
            'logo_path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Partner berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $partner = DB::table('partners')->where('id', $id)->first();
        $updateData = ['name' => $request->name, 'updated_at' => now()];

        if ($request->hasFile('logo_path')) {
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $updateData['logo_path'] = $request->file('logo_path')->store('partners', 'public');
        }

        DB::table('partners')->where('id', $id)->update($updateData);
        return back()->with('success', 'Partner diperbarui!');
    }

    public function destroy($id)
    {
        $partner = DB::table('partners')->where('id', $id)->first();
        if ($partner->image_path) {
            Storage::disk('public')->delete($partner->image_path);
        }
        DB::table('partners')->where('id', $id)->delete();
        return back()->with('success', 'Partner berhasil dihapus!');
    }
}
