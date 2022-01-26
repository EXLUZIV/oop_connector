<?php

namespace App\Classes;

use App\Interface\SeederInterface;

class SeederClass implements SeederInterface
{
	public static function up(): void
	{
		SeederUserClass::up();
		SeederPostClass::up();
		SeederComentClass::up();
	}
}