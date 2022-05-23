<?php

namespace Seior\PHP\Uas\Service\impl;

use Seior\PHP\Uas\Model\Todolist;
use Seior\PHP\Uas\Repository\TodolistRepository;
use Seior\PHP\Uas\Service\TodolistService;

class TodolistServiceImpl implements TodolistService
{

    public function __construct(private TodolistRepository $todolistRepository)
    {
    }

    public function create(Todolist $todolist)
    {
        $todolist->setId(uniqid(more_entropy: true));
        $this->todolistRepository->save($todolist);
    }

    public function findAll(string $user_id): array
    {
        return $this->todolistRepository->findAll($user_id);
    }

    public function delete(string $id): bool
    {
        $todolist = new Todolist();
        $todolist->setId($id);

        if ($this->todolistRepository->findById($todolist)) {
            $this->todolistRepository->delete($todolist);
            return true;
        }

        return false;
    }
}