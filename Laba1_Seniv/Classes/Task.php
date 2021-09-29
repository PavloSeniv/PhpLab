<?php
session_start();

class Task
{

    public function __construct()
    {
        if(!file_exists('../file.txt'))
        file_put_contents('../file.txt', null);
    }

    public function getTask()
    {
        $tasks = file_get_contents('../file.txt');
        $tasks = json_encode($tasks);
        $tasks =  $tasks ?? 'No task yet';
        echo $tasks;
    }

    public function setTask($date, $text)
    {
        try {

            $tasks = file_get_contents('../file.txt');
            $tasks = json_decode($tasks,true);

            $tasks[$date] = $text;
            ksort($tasks);

            file_put_contents('../file.txt',json_encode($tasks));
            $_SESSION['success'] = 'Task created!';
        }catch (Exception $e){
            $_SESSION['success'] = $e;
        }
        header("Location: /lab1/Task/create.php");
        exit();
    }

}