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
    // The queue worker type should be define inside a settings file.
    $this->QueueWorkerManager = QueueWorkerManager::getById('memory');
  }

  /**
   * {@inheritdoc}
   */
  public function sendMessage(Message $message) {
    $this->QueueWorkerManager->add($message);

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function reserveMessage($reserver_name, $category = NULL, $message_type = NULL) {
    return $this->QueueWorkerManager
      ->setFilters('reserver_name', $reserver_name)
      ->setFilters('category', $category)
      ->setFilters('message_type', $message_type)
      ->get();
  }

  /**
   * {@inheritdoc}
   */
  public function deleteMessage($message_id) {
    $this->QueueWorkerManager->delete($message_id);
  }

}
