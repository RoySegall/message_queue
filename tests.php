<?php

error_reporting(E_ALL);

use MessageQueue\MessageQueue;

require_once 'vendor/autoload.php';

$workerManager = new \MessageQueue\QueueWorkerManager();
$worker = $workerManager->getById('memory');
