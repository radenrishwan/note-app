<?php

namespace Seior\PHP\Uas\Repository\impl;

use PDO;
use Seior\PHP\Uas\Model\Note;
use Seior\PHP\Uas\Repository\NoteRepository;

class NoteRepositoryImpl implements NoteRepository
{


    public function __construct(private PDO $connection)
    {
    }

    public function save(Note $note)
    {
        $sql = "insert into note (id, user_id, title, subtitle, body, image, tag) values (?, ?, ?, ?, ?, ?, ?)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $note->getId(),
            $note->getUserId(),
            $note->getTitle(),
            $note->getSubtitle(),
            $note->getBody(),
            $note->getImage(),
            $note->getTag(),
        ]);
    }

    public function delete(Note $note)
    {
        $sql = "delete from note where id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $note->getId(),
        ]);
    }

    public function findById(Note $note): ?Note
    {
        $sql = "select * from note where id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $note->getId(),
        ]);

        if ($row = $statement->fetch()) {
            $note->setId($row['id']);
            $note->setUserId($row['user_id']);
            $note->setTitle($row['title']);
            $note->setSubtitle($row['subtitle']);
            $note->setBody($row['body']);
            $note->setImage($row['image']);
            $note->setTag($row['tag']);

            return $note;
        }

        return null;
    }

    public function findAll(string $id): array
    {
        $notes = [];
        $sql = "select * from note where user_id = ?";

        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);

        try {
            foreach ($statement as $row) {
                $note = new Note();

                $note->setId($row['id']);
                $note->setUserId($row['user_id']);
                $note->setTitle($row['title']);
                $note->setSubtitle($row['subtitle']);
                $note->setBody($row['body']);
                $note->setImage($row['image']);
                $note->setTag($row['tag']);

                array_push($notes, $note);
            }

            return $notes;
        } finally {
            $statement->closeCursor();
        }
    }
}