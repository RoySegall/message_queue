<?php

namespace MessageQueue\QueueWorkers;

use MessageQueue\Message;

/**
 * Class SimpleQueueWorker.
 *
 * The simple queue worker keep the messages in a class property.
 *
 * @package MessageQueue\QueueWorkers
 */
class SimpleQueueWorker extends QueueWorkerBase {

  protected $messages;

  /**
   * {@inheritdoc}
   */
  function get() {
    $reserver_name = $this->filters['reserver_name'];

    // First remove messages which not match the reserver name.
    $messages = array_filter($this->messages, function($message) use ($reserver_name) {
      return $message['reserver_name'] === $reserver_name;
    });

    $message = end($messages);
    return $message;
  }

  /**
   * {@inheritdoc}
   */
  function add(Message $message) {
    $this->messages[$message->getId()] = $message->toArray();
  }

  /**
   * {@inheritdoc}
   */
  function delete($message_id) {
  }

}
