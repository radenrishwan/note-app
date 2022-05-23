<?php

// routing app
use Dotenv\Dotenv;

require_once __DIR__ . '/../app/Http/routes.php';

// setup env
Dotenv::createImmutable(__DIR__ . '/../')->load();
