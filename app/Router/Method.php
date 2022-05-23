<?php

namespace Seior\PHP\Uas\Router;

enum Method
{
    case GET;
    case POST;

    public function getMethod(): string
    {
        return match ($this) {
            self::GET => 'GET',
            self::POST => 'POST',
        };
    }
}