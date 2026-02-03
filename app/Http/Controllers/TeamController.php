<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = DB::table('teams')->orderBy('order', 'asc')->get();
        return view('admin.teams', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'icon' => 'required',
            'image_path' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'quote' => 'nullable',
            'order' => 'required|integer',
        ]);

        $path = $request->file('image_path')->store('teams', 'public');

        DB::table('teams')->insert([
            'name'  => $request->name,
            'role'  => $request->role,
            'icon'  => $request->icon,
            'image_path' => $path,
            'quote' => $request->quote,
            'order' => $request->order,
            'created_at' => now(),
        ]);

        return back()->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'icon' => 'required',
            'image_path' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'order' => 'required|integer',
        ]);

        $team = DB::table('teams')->where('id', $id)->first();

        $updateData = [
            'name'  => $request->name,
            'role'  => $request->role,
            'icon'  => $request->icon,
            'quote' => $request->quote,
            'order' => $request->order,
            'updated_at' => now(),
        ];

        if ($request->hasFile('image_path')) {
            if ($team->image_path) {
                Storage::disk('public')->delete($team->image_path);
            }
            $updateData['image_path'] = $request->file('image_path')->store('teams', 'public');
        }

        DB::table('teams')->where('id', $id)->update($updateData);

        return back()->with('success', 'Data tim diperbarui!');
    }

    public function destroy($id)
    {
        $team = DB::table('teams')->where('id', $id)->first();

        if ($team && $team->image_path) {
            Storage::disk('public')->delete($team->image_path);
        }

        DB::table('teams')->where('id', $id)->delete();

        return back()->with('success', 'Anggota tim dihapus!');
    }
}
