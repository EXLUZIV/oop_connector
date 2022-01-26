<?php

namespace App\Classes;
class SeederUserClass

{
	public static function up(): void
	{
		global $connectBD;

		$user = new CreateUserClass($connectBD);
		$user->configUser('worker', 'Alex', 'secret pass', 'alex@gmail.com');
		$user->addUser();
	}
}