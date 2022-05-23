<?php

namespace Seior\PHP\Uas\Middleware;

interface Middleware
{
    function before(): void;
}