<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);

        try {

            $user = User::create($data);
        } catch(\Exception $e) {
            if ($e->getCode() == 23000) {
                $email = explode("'",$e->getMessage())[1];
                return redirect()->back()->withInput()->withErrors("Email $email já existente.");
            }
        }

        Auth::login($user);

        return redirect()->route('get_series');

    }
}
