<?php

namespace Seior\PHP\Uas\Controller;

use Firebase\JWT\JWT;
use Seior\PHP\Uas\Database\Connection;
use Seior\PHP\Uas\Helper\SessionManagement;
use Seior\PHP\Uas\Helper\View;
use Seior\PHP\Uas\Model\User;
use Seior\PHP\Uas\Repository\impl\UserRepositoryImpl;
use Seior\PHP\Uas\Service\impl\UserServiceImpl;
use Seior\PHP\Uas\Service\UserService;

class AuthController
{
    private UserService $userService;

    public function __construct()
    {
        $connection = Connection::getConnection();
        $userRepository = new UserRepositoryImpl($connection);
        $this->userService = new UserServiceImpl($userRepository);
    }

    public function login(): void
    {
        View::render('auth/login', ['title' => 'Selamat Datang']);
    }

    public function postLogin(): void
    {
        $user = new User();

        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);

        if ($this->userService->login($user)) {
            SessionManagement::setSession($user);
            View::redirect('/');
        } else {
            View::render('/auth/login', ['title' => 'Selamat Datang', 'error' => 'Username atau Password Salah']);
        }
    }

    public function logout(): void
    {
        setcookie('X-SESSION-LOGIN', '');
        View::redirect('/');
    }

    public function register(): void
    {
        View::render('auth/registration', ['title' => 'Register']);
    }

    public function postRegister(): void
    {
        $user = new User();

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $user->setUsername($_POST['username']);
        $user->setPassword($password);
        $user->setEmail($_POST['email']);

        try {
            $this->userService->register($user);

            View::redirect('/');
        } catch (\Exception) {
            View::render('auth/registration', ['title' => 'Register', 'error' => 'Terjadi error, silahkan isi semua form atau <br> username dan email telah digunakan']);
        }
    }
}