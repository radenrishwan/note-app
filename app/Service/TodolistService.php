<?php

namespace Seior\PHP\Uas\Service;

use Seior\PHP\Uas\Model\Todolist;

interface TodolistService
{
    public function create(Todolist $todolist);

    public function findAll(string $user_id): array;

    public function delete(string $id) : bool;

}