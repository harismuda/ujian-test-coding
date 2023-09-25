<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    function home ()
    {
        $sampah = Sampah::get();
        return view('home', compact('sampah'));
    }
    function index ()
    {
        $sampah = Sampah::get();
        return view('daftar.sampah', compact('sampah'));
    }
    function create ()
    {
        return view ('daftar.createSampah');
    }
    function store (Request $request)
    {
        Sampah::insert([
            'jenis_sampah'=>$request->jenis_sampah,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/sampah')->with('success', 'Sampah berhasil di tambahkan');
    }
    function edit($id)
    {
        $sampah = Sampah::where('id_sampah', $id)->get();
        return view('daftar.updateSampah', compact('sampah'));
    }
    function update(Request $request)
    {
        Sampah::where('id_sampah', $request->id_sampah)->update([
            'jenis_sampah' => $request->jenis_sampah,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('/sampah')->with('success', 'Sampah berhasil di edit');
    }
    function destroy($id)
    {
        Sampah::where('id_sampah', $id)->delete();
        return redirect('/sampah')->with('success', 'Sampah berhasil di Hapus');
    }
}
