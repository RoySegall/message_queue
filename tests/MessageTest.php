<?php

namespace tests;

use MessageQueue\Message;
use MessageQueue\MessageQueue;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase {

  /**
   * Testing the message queue logic.
   *
   * @throws \Exception
   */
  public function testMessage() {
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

    // Remove the ID from array because we don't wan't to assert that one.
    unset($message['id']);

    $this->assertEquals($message, [
      'message_type' => "delivery_destination",
      'category' => "actions",
      'text' => "MasterChef Kitchen sIL",
      'reserver_name' => "pizza_hut_dispatch_server",
    ]);
  }

}
