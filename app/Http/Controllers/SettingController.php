<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $settings = DB::table('settings')->pluck('value', 'key');
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        // Validasi input berdasarkan key yang ada di DB
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            DB::table('settings')
                ->where('key', $key)
                ->update([
                    'value' => $value,
                    'updated_at' => now()
                ]);
        }

        return back()->with('success', 'Pengaturan berhasil diperbarui!');
    }
}
