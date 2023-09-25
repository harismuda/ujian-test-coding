<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index ()
    {
        return view ('sesi.login');
    }
    function masuk(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib di isi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()) {
                return redirect('/home');
            }
        } else {
            return redirect('/login')->withErrors('Username dan password yang di masukkan tidak sesuai')->withInput();
        }
    }
    function register()
    {
        return view('sesi.register');
    }
    function store(Request $request)
    {
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login')->with('success', 'Anda berhasil di register');
    }
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
