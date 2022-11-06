<?php

namespace App\Enums;

abstract class GeneralSts
{
	const DISABLED = 0;
	const SUSPENDED = 10;
	const LOCKED = 20;
	const HIDDEN = 30;
	const ENABLED = 100;
}

class GeneralStatus extends GeneralSts
{
	public static function status($status){
		switch ($status) {
			case self::ENABLED:
				return "ACTIVO";
				break;
			
			default:
				return "INACTIVO";
				break;
		}
	}
}
