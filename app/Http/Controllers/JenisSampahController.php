<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use App\Models\Sampah;
use Illuminate\Http\Request;

class JenisSampahController extends Controller
{
    function index ()
    {
        $jenisSampah = JenisSampah::select('*')
        ->join('sampah', 'sampah.id_sampah', '=', 'jenis_sampah.id_sampah')
        ->get();
        return view('JenisSampah.jenis', compact('jenisSampah'));
    }
    function create ()
    {
        $sampah = Sampah::get();
        return view('JenisSampah.createJenisSampah', compact('sampah'));
    }
    function store(Request $request)
    {
        JenisSampah::insert([
            'id_sampah' => $request->id_sampah,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'harga_per_kg' => $request->harga,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('JenisSampah')->with('success', 'Jenis sampah berhasil di tambahkan');
    }
    function edit($id)
    {
        $jenisSampah = JenisSampah::where('id', $id)->get();
        $sampah = Sampah::get();
        return view('JenisSampah.updateJenisSampah', compact('jenisSampah','sampah'));
    }
    function update(Request $request)
    {
        JenisSampah::where('id', $request->id)->update([
            'id_sampah' => $request->id_sampah,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'harga_per_kg' => $request->harga,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('JenisSampah')->with('success', 'Jenis sampah berhasil di edit');
    }
    function destroy($id)
    {
        JenisSampah::where('id', $id)->delete();
        return redirect('/JenisSampah')->with('success', 'Sampah berhasil di Hapus');
    }
}
