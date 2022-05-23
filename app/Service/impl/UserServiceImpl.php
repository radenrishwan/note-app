<?php

namespace Seior\PHP\Uas\Service\impl;

use Seior\PHP\Uas\Model\User;
use Seior\PHP\Uas\Repository\UserRepository;
use Seior\PHP\Uas\Service\UserService;

class UserServiceImpl implements UserService
{

    public function __construct(public UserRepository $userRepository)
    {

    }


    public function register(User $user): void
    {
        $this->userRepository->save($user);
    }

    public function login(User $user): bool
    {
        $userFound = $this->userRepository->findByUsername($user->getUsername());

        if ($userFound === null) {
            return false;
        }

        return password_verify($user->getPassword(), $userFound->getPassword());
    }
}