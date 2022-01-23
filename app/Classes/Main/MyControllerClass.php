<?php

namespace App\Classes;

class MyControllerClass {
   private $configuration;

   public function __construct(string $configuration) {
      $this->configuration = $configuration;
   }
}