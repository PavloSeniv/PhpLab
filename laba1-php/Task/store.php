<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/Task.php';

$task = new Task();

$task->setTask($_POST['date'], $_POST['task']);