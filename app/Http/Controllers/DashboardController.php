<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Menu;
use App\Models\User;

class DashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('back.dashboard', [
			'menu' => Menu::generate(['active' => 'Dashboard']),
			'total_users' => User::all()->count(),
		]);
	}

}
