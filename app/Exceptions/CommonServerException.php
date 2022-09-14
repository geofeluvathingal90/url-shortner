<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class CommonServerException extends Exception
{
  public function render()
  {
    return response($this->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
  }
}
