<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/FileService.php';

$fileService = new FileService();
$fileService->delete($_GET['table'],$_GET['row']);
