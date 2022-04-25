<?php

namespace App\Http\Controllers;

use App\Models\UserCodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// https://www.youtube.com/watch?v=7zIp1zoUpqk

class LoginController extends Controller
{
	public function index()
	{
		return view('login');
	}

	public function login(Request $request)
	{
		if (!Auth::attempt([
			'user' => $request->input('user'),
			'password' => $request->input('password'),
		])) {
			// Incorrect user or password
			return back()->with('error', 'Usuario o Contraseña Invalidos!');
		} else {
			if (Auth::user()->status == UserCodes::ENABLED) {
				$request->session()->regenerate();
				return redirect()->route('home');
			}

			$request->session()->invalidate();
			return back()->with('error', 'Usuario no autorizado');
		}
	}

	public function logout(Request $request)
	{
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('home');
	}
}
