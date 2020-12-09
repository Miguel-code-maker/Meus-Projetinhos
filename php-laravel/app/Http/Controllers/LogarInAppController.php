<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogarInAppController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only(['email','password']))) {
            return redirect()->back()->withErrors('Usuarios e/ou senha incorretas');
        }

        return redirect()->route('get_series');
    }
}
