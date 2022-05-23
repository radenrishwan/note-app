<?php

namespace Seior\PHP\Uas\Repository;

use Seior\PHP\Uas\Model\User;

interface UserRepository
{
    public function save(User $user): void;
    public function findByUsername(string $username): ?User;
}