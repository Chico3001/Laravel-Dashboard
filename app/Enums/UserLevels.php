<?php

namespace App\Enums;

// @TODO: revisar si es posble simplifcar el uso de 2 clases
abstract class UserLvl
{
	const DISABLED = 0;
	const SUPER = 255;
	const USER = 10;
	const ADMIN = 100;
}

class UserLevels extends UserLvl
{
}
