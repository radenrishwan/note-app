<?php

namespace Seior\PHP\Uas\Service;

use Seior\PHP\Uas\Model\Note;

interface NoteService
{
    public function create(Note $note);

    public function findAll(string $user_id): array;

    public function delete(string $id) : bool;

}