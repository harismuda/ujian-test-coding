<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $sampah = Sampah::select('*')
        ->join('jenis_sampah', 'jenis_sampah.id_sampah', '=', 'sampah.id_sampah')
        ->get();
        return view ('frontend.index', compact('sampah'));
    }

    function transaksi(Request $request)
    {
        Transaksi::insert([
            'id_sampah'=>$request->jenis_sampah,
            'total'=>$request->total
        ]);
        return redirect('total');
    }
    function total()
    {
        $transaksi = Transaksi::select('*')
        ->join('jenis_sampah', 'jenis_sampah.id_sampah', '=', 'transaksi.id_sampah')
        ->join('sampah', 'sampah.id_sampah', '=', 'transaksi.id_sampah')
        ->get();
        return view ('frontend.total', compact('transaksi'));
    }
    function selesai($id)
    {
        Transaksi::where('id_transaksi', $id)->delete();
        return redirect('/');
    }
}
