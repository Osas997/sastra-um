<?php

namespace App\Exceptions;

use Exception;

class CustomErrorException extends Exception
{
    protected $message;
    protected $isWithInput;

    public function __construct($message, $isWithInput = false)
    {
        $this->message = $message;
        $this->isWithInput = $isWithInput;
    }

    public function render($request)
    {
        return $this->isWithInput ? redirect()->back()->with('error', $this->message)->withInput() : redirect()->back()->with('error', $this->message);
    }
}
