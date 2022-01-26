<?php

namespace App\Classes;

use App\Interface\SeederInterface;

class SeederUserClass implements SeederInterface
{
	public static function up(): void
	{
		global $connectBD;

		$user = new CreateUserClass($connectBD);
		$user->configUser('worker', 'Alex', 'secret pass', 'alex@gmail.com');
		$user->addUser();
	}
}