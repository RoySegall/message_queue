<?php

namespace MessageQueue;

interface MessageQueueInterface {

  /**
   * Adds a message to the queue.
   *
   * @param Message $message
   *   The message object.
   *
   * @return MessageQueueInterface
   */
  public function sendMessage(Message $message);

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
  public function reserveMessage($reserver_name, $category = NULL, $message_type = NULL);

  /**
   * Deleting a message from the queue.
   *
   * @param $message_id
   *   The message ID to delete.
   */
  public function deleteMessage($message_id);
}
