<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        // Mengurutkan berdasarkan field 'order' terkecil ke terbesar
        $teams = DB::table('teams')->orderBy('order', 'asc')->get();
        return view('admin.teams', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'icon' => 'required',
            'quote' => 'nullable',
            'order' => 'required|integer',
        ]);

        DB::table('teams')->insert([
            'name'  => $request->name,
            'role'  => $request->role,
            'icon'  => $request->icon,
            'quote' => $request->quote,
            'order' => $request->order,
            'created_at' => now(),
        ]);

        return back()->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        DB::table('teams')->where('id', $id)->update([
            'name'  => $request->name,
            'role'  => $request->role,
            'icon'  => $request->icon,
            'quote' => $request->quote,
            'order' => $request->order,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Data tim diperbarui!');
    }

    public function destroy($id)
    {
        DB::table('teams')->where('id', $id)->delete();
        return back()->with('success', 'Anggota tim dihapus!');
    }
}
