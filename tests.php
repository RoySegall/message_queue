<?php

error_reporting(E_ALL);

use MessageQueue\Message;
use MessageQueue\MessageQueue;

require_once 'vendor/autoload.php';

$queue = new MessageQueue();
$message = new Message('foo');
$queue->sendMessage($message);
