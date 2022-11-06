<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('back.users', [
			'menu' => Menu::generate(['active' => 'Usuarios']),
			'users' => User::all(),
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if (User::where('name', $request->input('name'))->exists()) {
			// Usuario ya existe
			return response()->json([
				'success' => 'error',
				'msg' => 'El nombre del usuario ya existe',
			], 200);
		} else {
			// Crea usuario
			$user = new User();
			$user->fill($request->all());
			$user->save();

			return response()->json([
				'success' => 'ok',
				'msg' => 'Usuario agregado con exito',
			], 200);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function show(User $user)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function edit(User $user)
	{
		return $user;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, User $user)
	{
		$user->delete();

		return response()->json([
			'success' => 'ok',
			'msg' => 'Usuario borrado con exito',
		], 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\User  $user
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(User $user)
	{
		//
	}
}
