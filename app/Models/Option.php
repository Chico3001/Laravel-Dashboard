<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	use HasFactory;

	public $incrementing = false;

	protected $primaryKey = 'name';
	protected $keyType = 'string';
	protected $fillable = ['name', 'string'];

	public static function Get($name)
	{
		$value = (new static)::where('name', $name)->first();

		// Returns value
		if ($value) {
			return $value->value;
		} else {
			return false;
		}
	}

	public static function GetJSON($name)
	{
		$value = (new static)::where('name', $name)->first();

		// Returns decoded JSON
		if ($value) {
			return json_decode($value->value, true);
		} else {
			return false;
		}
	}
}
