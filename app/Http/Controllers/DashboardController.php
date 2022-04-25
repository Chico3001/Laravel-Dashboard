<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Menu;

class DashboardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('dashboard', [
			'menu' => Menu::generate(['active' => 'Dashboard']),
		]);
	}

}
