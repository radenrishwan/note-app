<?php

namespace Seior\PHP\Uas\Service;

use Seior\PHP\Uas\Model\User;

interface UserService
{
    public function register(User $user): void;
    public function login(User $user): bool;

}