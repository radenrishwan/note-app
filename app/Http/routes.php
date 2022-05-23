<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Seior\PHP\Uas\Controller\AuthController;
use Seior\PHP\Uas\Controller\FileController;
use Seior\PHP\Uas\Controller\HomeController;
use Seior\PHP\Uas\Helper\RegexPattern;
use Seior\PHP\Uas\Middleware\AuthMiddleware;
use Seior\PHP\Uas\Router\Method;
use Seior\PHP\Uas\Router\Router;

Router::add(Method::GET, '/', HomeController::class, 'index', [AuthMiddleware::class]);

// auth
Router::add(Method::GET, '/login', AuthController::class, 'login');
Router::add(Method::POST, '/login', AuthController::class, 'postLogin');
Router::add(Method::GET, '/register', AuthController::class, 'register');
Router::add(Method::POST, '/register', AuthController::class, 'postRegister');
Router::add(Method::GET, '/logout', AuthController::class, 'logout');

// schedule
Router::add(Method::POST, '/schedule/create', HomeController::class, 'createSchedule');
Router::add(Method::GET, '/schedule/delete', HomeController::class, 'deleteSchedule');

// todolist
Router::add(Method::POST, '/todolist/create', HomeController::class, 'createTodoList');
Router::add(Method::GET, '/todolist/delete', HomeController::class, 'deleteTodolist');

// notes
Router::add(Method::POST, '/notes/create', HomeController::class, 'createNote');
Router::add(Method::POST, '/notes/delete', HomeController::class, 'deleteNote');

// get images
Router::add(Method::GET, '/images/' . RegexPattern::$matchAllNumberText, FileController::class, 'getImage');


Router::run();