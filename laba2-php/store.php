<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Classes/FileService.php';

FileService::store($_FILES['file']);


