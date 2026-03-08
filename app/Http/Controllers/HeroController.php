<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::orderBy('id', 'asc')->get();
        return view('admin.hero', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'nav_label' => 'required|string|max:50',
            'subtitle' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_url' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('sliders', 'public');
        }

        HeroSlider::create($data);
        return redirect()->route('hero.index')->with('success', 'Slide berhasil ditambahkan.');
    }

    public function update(Request $request, HeroSlider $heroSlider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'nav_label' => 'required|string|max:50',
            'subtitle' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'video_url' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($heroSlider->image_path) Storage::disk('public')->delete($heroSlider->image_path);
            $data['image_path'] = $request->file('image')->store('sliders', 'public');
        }

        $heroSlider->update($data);
        return redirect()->route('hero.index')->with('success', 'Slide berhasil diperbarui.');
    }

    public function destroy(HeroSlider $heroSlider)
    {
        if ($heroSlider->image_path) Storage::disk('public')->delete($heroSlider->image_path);
        $heroSlider->delete();
        return redirect()->route('hero.index')->with('success', 'Slide berhasil dihapus.');
    }
}
