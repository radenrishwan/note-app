<?php

namespace Seior\PHP\Uas\Controller;

use Exception;
use Seior\PHP\Uas\Database\Connection;
use Seior\PHP\Uas\Helper\Message;
use Seior\PHP\Uas\Helper\SessionManagement;
use Seior\PHP\Uas\Helper\View;
use Seior\PHP\Uas\Model\Note;
use Seior\PHP\Uas\Model\Schedule;
use Seior\PHP\Uas\Model\Todolist;
use Seior\PHP\Uas\Repository\impl\NoteRepositoryImpl;
use Seior\PHP\Uas\Repository\impl\ScheduleRepositoryImpl;
use Seior\PHP\Uas\Repository\impl\TodolistRepositoryImpl;
use Seior\PHP\Uas\Service\impl\NoteServiceImpl;
use Seior\PHP\Uas\Service\impl\ScheduleServiceImpl;
use Seior\PHP\Uas\Service\impl\TodolistServiceImpl;
use Seior\PHP\Uas\Service\NoteService;
use Seior\PHP\Uas\Service\ScheduleService;
use Seior\PHP\Uas\Service\TodolistService;

class HomeController
{
    private ScheduleService $scheduleService;
    private TodolistService $todolistService;
    private NoteService $noteService;

    public function __construct()
    {
        $connection = Connection::getConnection();
        $scheduleRepository = new ScheduleRepositoryImpl($connection);
        $this->scheduleService = new ScheduleServiceImpl($scheduleRepository);

        $todolistRepository = new TodolistRepositoryImpl($connection);
        $this->todolistService = new TodolistServiceImpl($todolistRepository);

        $noteRepository = new NoteRepositoryImpl($connection);
        $this->noteService = new NoteServiceImpl($noteRepository);
    }

    public function index()
    {
        $message = Message::$messages[rand(0, sizeof(Message::$messages) - 1)];

        try {
            $session = SessionManagement::getCurrentSession();

            $schedules = $this->scheduleService->findAll($session->getUsername());
            $todolists = $this->todolistService->findAll($session->getUsername());
            $notes = $this->noteService->findAll($session->getUsername());

            View::render('home/home', ['title' => 'Home',
                'session' => $session,
                'message' => $message,
                'schedules' => $schedules,
                'todolists' => $todolists,
                'notes' => $notes
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function createSchedule()
    {
        $schedule = new Schedule();

        try {
            $session = SessionManagement::getCurrentSession();

            $schedule->setUserId($session->getUsername());
            $schedule->setDate($_POST['date']);
            $schedule->setTitle($_POST['title']);
            $schedule->setActivity($_POST['description']);

            $this->scheduleService->create($schedule);

            View::redirect('/a#jadwal');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteSchedule()
    {
        $id = $_GET['id'];

        try {
            $this->scheduleService->delete($id);

            View::redirect('/#jadwal');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function createTodolist()
    {
        $todolist = new Todolist();

        try {
            $session = SessionManagement::getCurrentSession();

            $todolist->setUserId($session->getUsername());
            $todolist->setTitle($_POST['title']);
            $todolist->setActivity($_POST['description']);

            $this->todolistService->create($todolist);

            View::redirect('/#todolist');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteTodolist()
    {
        $id = $_GET['id'];

        try {
            $this->todolistService->delete($id);

            View::redirect('/#todolist');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function createNote()
    {
        $note = new Note();

        // save files
        $file_name = $_FILES['note-image']['name'];
        $file_tmp = $_FILES['note-image']['tmp_name'];
        $file_path = __DIR__ . '/../../public/files/' . $file_name;

        move_uploaded_file($file_tmp, $file_path);

        try {
            $session = SessionManagement::getCurrentSession();

            $note->setUserId($session->getUsername());
            $note->setTitle($_POST['title']);
            $note->setSubtitle($_POST['subtitle']);
            $note->setTag($_POST['tag']);
            $note->setBody($_POST['body']);

            // get name without extension
            $name = pathinfo($file_path, PATHINFO_FILENAME);
            $note->setImage($name);

            $this->noteService->create($note);

            View::redirect('/#catatan');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function deleteNote()
    {
        $id = $_GET['id'];

        try {
            $this->noteService->delete($id);
            View::redirect('/#catatan');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}