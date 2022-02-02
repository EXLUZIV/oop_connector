<?php

namespace App\Classes;

class SeederPostClass
{
	public static function up(): void
	{
		global $connectBD;

		$post = new CreatePostClass($connectBD);
		$post->configPost('post_by_worker', '3', 'Title for post', 'first post by vova');
		$post->addPost();
		$post->configPost('post_by_worker', '1', 'Title for post', 'first post by alex');
		$post->addPost();
		$post->configPost('post_by_worker', '2', 'Title for post', 'first post by dima');
		$post->addPost();
		$post->configPost('post_by_worker', '1', 'Title for post', 'second post by alex');
		$post->addPost();
		$post->configPost('post_by_worker', '2', 'Title for post', 'second post by dima');
		$post->addPost();
	}
}