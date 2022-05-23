<?php

namespace Seior\PHP\Uas\Repository;

use Seior\PHP\Uas\Model\Note;

interface NoteRepository
{
    public function save(Note $note);

    public function delete(Note $note);

    public function findById(Note $note): ?Note;

    public function findAll(string $id): array;
}