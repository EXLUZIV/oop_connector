<?php

namespace App\Classes;

class AutoloadClass
{

	public static function autoload()
	{

		spl_autoload_register(function ($class) {

			$prefix = 'App\\Classes\\';
		
			$base_dir = 'app/Classes/Main/';

			// echo $base_dir;
			// die();
		
			$len = strlen($prefix);
			if (strncmp($prefix, $class, $len) !== 0) {
		
				 return;
			}
		
			$relative_class = substr($class, $len);


			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
		
			if (file_exists($file)) {
				 require $file;
			}

			// echo $file;
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
		
		spl_autoload_register(function ($interface) {
		
			$prefix = 'App\\Interface\\';
			$base_dir = 'app/Interface/';
		
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