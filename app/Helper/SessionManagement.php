<?php

namespace Seior\PHP\Uas\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class SessionManagement
{
    public static string $SECRET_KEY = 'ashdkashdkashkujsgaflkjashfkjasghfkjasfasl';

    public static function setSession($user)
    {
        $payload = [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
        ];

        $jwt = JWT::encode($payload, SessionManagement::$SECRET_KEY, 'HS256');

        setcookie('X-SESSION-LOGIN', $jwt, time() + (3600 * 12 * 7), httponly: true);
    }

    /**
     * @throws Exception
     */
    public static function getCurrentSession(): Session
    {
        if (isset($_COOKIE['X-SESSION-LOGIN'])) {
            $jwt = $_COOKIE['X-SESSION-LOGIN'];

            try {
                $payload = JWT::decode($jwt, new Key(SessionManagement::$SECRET_KEY, 'HS256'));

                $session = new Session();
                $session->setUsername($payload->username);
                $session->setPassword($payload->password);

                return $session;
            } catch (Exception) {
                throw new Exception('No session found');
            }
        } else {
            throw new Exception('No session found');
        }
    }
}

class Session
{
    private string $username;
    private string $password;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}