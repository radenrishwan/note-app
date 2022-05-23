<?php

namespace Seior\PHP\Uas\Repository\impl;

use PDO;
use Seior\PHP\Uas\Model\Todolist;
use Seior\PHP\Uas\Repository\TodolistRepository;

class TodolistRepositoryImpl implements TodolistRepository
{


    public function __construct(private PDO $connection)
    {
    }

    public function save(Todolist $todolist)
    {
        $sql = "INSERT INTO todolist (id, user_id, title, activity) VALUES (?, ?, ?, ?)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $todolist->getId(),
            $todolist->getUserId(),
            $todolist->getTitle(),
            $todolist->getActivity()
        ]);
    }

    public function delete(Todolist $todolist)
    {
        $sql = "delete from todolist where id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $todolist->getId()
        ]);
    }

    public function findById(Todolist $todolist): ?Todolist
    {
        $sql = "select * from todolist where id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $todolist->getId()
        ]);

        if ($row = $statement->fetch()) {
            $todolist->setId($row['id']);
            $todolist->setUserId($row['user_id']);
            $todolist->setTitle($row['title']);
            $todolist->setActivity($row['activity']);

            return $todolist;
        }

        return null;
    }

    public function findAll(string $id): array
    {
        $todolists = [];
        $sql = "select * from todolist where user_id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);

        try {
            foreach ($statement as $row) {
                $todolist = new Todolist();

                $todolist->setId($row['id']);
                $todolist->setTitle($row['title']);
                $todolist->setUserId($row['user_id']);
                $todolist->setActivity($row['activity']);

                array_push($todolists, $todolist);
            }

            return $todolists;
        } finally {
            $statement->closeCursor();
        }
    }
}