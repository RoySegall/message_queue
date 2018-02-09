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
   */
  public function __construct() {
  }

  /**
   * Adds a message to the queue.
   *
   * @param Message $message
   */
  public function sendMessage(Message $message) {

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
