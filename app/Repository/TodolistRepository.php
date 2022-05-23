<?php

namespace Seior\PHP\Uas\Repository;

use Seior\PHP\Uas\Model\Todolist;

interface TodolistRepository
{
    public function save(Todolist $todolist);

    public function delete(Todolist $todolist);

    public function findById(Todolist $todolist): ?Todolist;

    public function findAll(string $id): array;
}