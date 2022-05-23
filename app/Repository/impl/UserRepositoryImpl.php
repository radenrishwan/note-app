<?php

namespace Seior\PHP\Uas\Repository\impl;

use PDO;
use Seior\PHP\Uas\Database\Connection;
use Seior\PHP\Uas\Model\User;
use Seior\PHP\Uas\Repository\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    public function __construct(private PDO $connection)
    {
    }

    public function save(User $user): void
    {
        $sql = "insert into users (username, email, password) values (?, ?, ?)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

    public function findByUsername(string $username): ?User
    {
        $sql = "select * from users where username = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$username]);

        try {
            if ($row = $statement->fetch()) {
                $user = new User();

                $user->setUsername($row['username']);
                $user->setEmail($row['email']);
                $user->setPassword($row['password']);

                return $user;
            }

            return null;
        } finally {
            $statement->closeCursor();
        }
    }
}