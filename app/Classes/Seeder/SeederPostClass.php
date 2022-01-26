<?php

namespace App\Classes;

use App\Interface\SeederInterface;

class SeederPostClass implements SeederInterface
{
	public static function up(): void
	{
		global $connectBD;

		$post = new CreatePostClass($connectBD);
		$post->configPost('post_by_worker', '1', 'Title for post', 'first post by alex');
		$post->addPost();
	}
}