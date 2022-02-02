<?php

namespace App\Classes;

class SeederComentClass
{
	public static function up(): void
	{
		global $connectBD;

		$coment = new CreateComentClass($connectBD);
		$coment->configComent('coment_by_worker', '2' , '1' , 'first coment by alex');
		$coment->addComent();
		$coment->configComent('coment_by_worker', '1' , '1' , 'second coment by alex');
		$coment->addComent();
		$coment->configComent('coment_by_worker', '3' , '3' , 'first coment by vova');
		$coment->addComent();
	}
}