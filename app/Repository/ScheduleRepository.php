<?php

namespace Seior\PHP\Uas\Repository;

use Seior\PHP\Uas\Model\Schedule;

interface ScheduleRepository
{
    public function save(Schedule $schedule);

    public function delete(Schedule $schedule);

    public function findAll(string $id): array;
}