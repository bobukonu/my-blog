<?php

namespace App\Exceptions;

use Exception;

class NotAuthorizedException extends Exception
{
  protected $route;

     public function redirect($route) {
         $this->route = $route;

         return $this;
     }

     public function route() {
         return $this->route;
     }
}
