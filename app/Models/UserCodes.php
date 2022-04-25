<?php

namespace App\Models;

abstract class UserStatus
{
	const DISABLED = 0;
	const SUSPENDED = 110;
	const LOCKED = 120;
	const HIDDEN = 130;
	const ENABLED = 200;
}

class UserCodes extends UserStatus
{
}
