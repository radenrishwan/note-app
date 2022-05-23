<?php

namespace Seior\PHP\Uas\Service;

use Seior\PHP\Uas\Model\Schedule;

interface ScheduleService
{
    public function create(Schedule $schedule);

    public function findAll(string $user_id): array;

    public function delete(string $id) : bool;
}