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
   *
   * @param string $reserver_name
   *   The reserver name.
   * @param string $category
   *   The category of the message. Optional.
   * @param string $message_type
   *   The message type. Optional.
   *
   * @return Message
   *   The first message which match this filters.
   */
  public function reserveMessage($reserver_name, $category = NULL, $message_type = NULL) {
    return $this->QueueWorkerManager
      ->setFilters('reserver_name', $reserver_name)
      ->setFilters('category', $category)
      ->setFilters('message_type', $message_type)
      ->get();
  }

  /**
   * Deleting a message from the queue.
   */
  public function deleteMessage() {

  }

}
