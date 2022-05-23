<?php

namespace Seior\PHP\Uas\Model;

class Schedule
{
    private string $id;
    private string $user_id;
    private string $date;
    private string $title;
    private string $activity;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @param string $id
     */
    public function setUserId(string $id): void
    {
        $this->user_id = $id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getActivity(): string
    {
        return $this->description;
    }

    /**
     * @param string $activity
     */
    public function setActivity(string $activity): void
    {
        $this->description = $activity;
    }
}