<?php

namespace Seior\PHP\Uas\Service\impl;

use Seior\PHP\Uas\Model\Note;
use Seior\PHP\Uas\Repository\NoteRepository;
use Seior\PHP\Uas\Service\NoteService;

class NoteServiceImpl implements NoteService
{


    public function __construct(private NoteRepository $noteRepository)
    {
    }

    public function create(Note $note)
    {
        $note->setId(uniqid(more_entropy: true));
        $this->noteRepository->save($note);
    }

    public function findAll(string $user_id): array
    {
        return $this->noteRepository->findAll($user_id);
    }

    public function delete(string $id): bool
    {
        $note = new Note();
        $note->setId($id);

        $this->noteRepository->delete($note);
        return false;
    }
}