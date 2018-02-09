<?php

error_reporting(E_ALL);
require_once 'vendor/autoload.php';

use MessageQueue\Message;
use MessageQueue\MessageQueue;

$queue = new MessageQueue();
$messages = [
  new Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with Pineapple'),
  new Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with 1/2 Corn 1/2 Mushrooms'),
  new Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with Pepperoni'),
  new Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with Green Olives'),
  new Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with Green Olives, Spicey Pepper'),
  new Message('pizza_hut_dispatch_server', 'delivery_destination', 'actions', 'White House'),
  new Message('pizza_hut_dispatch_server', 'delivery_destination', 'actions', 'Fort Knox'),
  new Message('pizza_hut_dispatch_server', 'delivery_destination', 'actions', 'Eiffel Tower'),
  new Message('pizza_hut_dispatch_server', 'delivery_destination', 'actions', 'Bikini Bottom'),
  new Message('pizza_hut_dispatch_server', 'delivery_destination', 'actions', 'MasterChef Kitchen IL'),
  new Message('agadir_dispatch_server', 'new_order', 'actions', 'maxi + fries + coke'),
  new Message('agadir_dispatch_server', 'new_order', 'actions', 'veggy burger + salad'),
  new Message('dixy_dispatch_server', 'new_order', 'actions', 'Dixcy wings'),
  new Message('dixy_dispatch_server', 'new_order', 'actions', 'Philadelphia sandwich'),
  new Message('krusty_crab', 'new_order', 'actions', 'Krabby patty'),
];

foreach ($messages as $message) {
  $queue->sendMessage($message);
}

$message = $queue->reserveMessage('pizza_hut_dispatch_server');
\Kint::dump($message);
