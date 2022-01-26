<?php

namespace App\Classes;

class SeederPostClass
{
	public static function up(): void
	{
		global $connectBD;

		$post = new CreatePostClass($connectBD);
		$post->configPost('post_by_worker', '1', 'Title for post', 'first post by alex');
		$post->addPost();
	}
}