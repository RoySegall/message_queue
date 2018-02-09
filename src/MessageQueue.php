<?php

namespace MessageQueue;

/**
 * A simple message queue manager.
 *
 * @package MessageQueue
 *
 * todo: move to a service.
 */
class MessageQueue implements MessageQueueInterface {

  protected $QueueWorkerManager;

  /**
   * Constructing a message.
   *
   * @throws QueueWorkers\QueueWorkerException
   */
  public function __construct() {
    $this->QueueWorkerManager = QueueWorkerManager::getById('memory');
  }

  /**
   * Adds a message to the queue.
   *
   * @param Message $message
   */
  public function sendMessage(Message $message) {
    $this->QueueWorkerManager->add($message);
  }

  /**
   * Reserves the first added message in queue that fits the filter.
   */
  public function reserveMessage() {

  }

  /**
   * Deleting a message from the queue.
   */
  public function deleteMessage() {

  }

}
