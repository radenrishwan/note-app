<?php

namespace Seior\PHP\Uas\Service\impl;

use Seior\PHP\Uas\Model\Schedule;
use Seior\PHP\Uas\Repository\ScheduleRepository;
use Seior\PHP\Uas\Service\ScheduleService;

class ScheduleServiceImpl implements ScheduleService
{


    public function __construct(private ScheduleRepository $scheduleRepository)
    {
    }

    public function create(Schedule $schedule)
    {
        $schedule->setId(uniqid(more_entropy: true));
        $this->scheduleRepository->save($schedule);
    }

    public function findAll(string $user_id): array
    {
        return $this->scheduleRepository->findAll($user_id);
    }

    public function delete(string $id) : bool
    {
        $schedule = new Schedule();
        $schedule->setId($id);

        $result = $this->scheduleRepository->findById($schedule);

        if ($result != null) {
            $this->scheduleRepository->delete($schedule);

            return true;
        }

        return false;
    }
}