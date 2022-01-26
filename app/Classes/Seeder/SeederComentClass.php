<?php

namespace App\Classes;

use App\Interface\SeederInterface;

class SeederComentClass implements SeederInterface
{
	public static function up(): void
	{
		global $connectBD;

		$coment = new CreateComentClass($connectBD);
		$coment->configComent('coment_by_worker', '1' , '1' , 'first coment by alex');
		$coment->addComent();
	}
}