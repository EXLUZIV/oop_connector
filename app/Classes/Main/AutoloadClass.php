<?php

namespace App\Classes;

class AutoloadClass
{

	public static function autoload()
	{

		spl_autoload_register(function ($class) {

			$prefix = 'App\\Classes\\';
			$base_dir = 'app/Classes/Main/';
		
			$len = strlen($prefix);
			if (strncmp($prefix, $class, $len) !== 0) {

				 return;
			}
		
			$relative_class = substr($class, $len);

			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}
		});
		

		spl_autoload_register(function ($class) {

			$prefix = 'App\\Classes\\';
			$base_dir = 'app/Classes/Post/';
		
			$len = strlen($prefix);
			if (strncmp($prefix, $class, $len) !== 0) {

				 return;
			}
		
			$relative_class = substr($class, $len);

			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}
		});


		spl_autoload_register(function ($class) {
		
			$prefix = 'App\\Classes\\';
			$base_dir = 'app/Classes/Migration/';
		
			$len = strlen($prefix);
			if (strncmp($prefix, $class, $len) !== 0) {
		
				 return;
			}

			$relative_class = substr($class, $len);
		
			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}
		});

		spl_autoload_register(function ($class) {
		
			$prefix = 'App\\Seeder\\';
			$base_dir = 'app/Seeder/';
		
			$len = strlen($prefix);
			if (strncmp($prefix, $class, $len) !== 0) {
		
				 return;
			}

			$relative_class = substr($class, $len);
		
			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}
		});
		
		spl_autoload_register(function ($interface) {
		
			$prefix = 'App\\Interface\\';
			$base_dir = 'app/Interface/Main/';
		
			$len = strlen($prefix);
			if (strncmp($prefix, $interface, $len) !== 0) {
		
				 return;
			}
			$relative_class = substr($interface, $len);
		
			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}
		});

		spl_autoload_register(function ($interface) {
		
			$prefix = 'App\\Interface\\';
			$base_dir = 'app/Interface/Seeder/';
		
			$len = strlen($prefix);
			if (strncmp($prefix, $interface, $len) !== 0) {
		
				 return;
			}
			$relative_class = substr($interface, $len);
		
			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}
		});
	}
}