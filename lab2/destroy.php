<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lab2/Classes/FileService.php';

$fileService = new FileService();
$fileService->delete($_GET['table'],$_GET['row']);
