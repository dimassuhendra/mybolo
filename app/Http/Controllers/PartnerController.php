<?php

namespace App\Http\Controllers;

use App\Models\Partner;

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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'logo_hover_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('logo_path')) {
            $data['logo_path'] = $request->file('logo_path')->store('partners', 'public');
        }

        if ($request->hasFile('logo_hover_path')) {
            $data['logo_hover_path'] = $request->file('logo_hover_path')->store('partners', 'public');
        }

        Partner::create($data);

        return redirect()->back()->with('success', 'Partner berhasil ditambahkan!');
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'logo_hover_path' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('logo_path')) {
            $data['logo_path'] = $request->file('logo_path')->store('partners', 'public');
        }

        if ($request->hasFile('logo_hover_path')) {
            $data['logo_hover_path'] = $request->file('logo_hover_path')->store('partners', 'public');
        }

        $partner->update($data);

        return redirect()->back()->with('success', 'Partner berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $partner = DB::table('partners')->where('id', $id)->first();

        if ($partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
        }

        if (isset($partner->logo_hover_path) && $partner->logo_hover_path) {
            Storage::disk('public')->delete($partner->logo_hover_path);
        }

        DB::table('partners')->where('id', $id)->delete();
        return back()->with('success', 'Partner berhasil dihapus!');
    }
}
