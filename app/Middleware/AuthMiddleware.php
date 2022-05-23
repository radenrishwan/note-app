<?php

namespace Seior\PHP\Uas\Middleware;

use Seior\PHP\Uas\Helper\View;

class AuthMiddleware implements Middleware
{
    public function __construct()
    {
    }

    function before(): void
    {
        if (!isset($_COOKIE['X-SESSION-LOGIN'])) {
            View::redirect('/login');
            exit;
        }
    }
}