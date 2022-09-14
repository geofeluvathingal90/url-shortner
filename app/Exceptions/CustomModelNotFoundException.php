<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CustomModelNotFoundException extends Exception
{
  public function render()
  {
    return response($this->getMessage(),Response::HTTP_NOT_FOUND);
  }
}
