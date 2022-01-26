<?php

namespace App\Classes;

class SeederComentClass
{
	public static function up(): void
	{
		global $connectBD;

		$coment = new CreateComentClass($connectBD);
		$coment->configComent('coment_by_worker', '1' , '1' , 'first coment by alex');
		$coment->addComent();
	}
}