<?php

namespace MessageQueue\QueueWorkers;

use MessageQueue\Message;

abstract class QueueWorkerBase {

  protected $filters = [
    'message_type' => '',
    'category' => '',
    'reserver_name' => '',
  ];

  /**
   * Get a message from the queue.
   *
   * @return mixed
   */
  abstract function get();

  /**
   * Adds a message to the queue.
   *
   * @param Message $message
   *
   * @return mixed
   */
  abstract function add(Message $message);

  /**
   * Delete a message from the queue.
   *
   * @param $message_id
   *   The message ID to delete.
   *
   * @return mixed
   */
  abstract function delete($message_id);

  /**
   * Setting a filter to filter by.
   *
   * @param $name
   *   The name of the filter.
   * @param $value
   *   The  filter name.
   *
   * @return QueueWorkerBase
   */
  protected function setFilters($name, $value) {
    $this->filters[$name] = $value;
    return $this;
  }

}
