<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/FileService.php';

$fileService = new FileService();
$fileService->update($_GET['table'],$_GET['row'],$_POST['data']);
