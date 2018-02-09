<?php

namespace MessageQueue\QueueWorkers;

abstract class QueueWorkerBase {

  /**
   * Get a message from the queue.
   *
   * @return mixed
   */
  abstract function get();

  /**
   * Adds a message to the queue.
   *
   * @return mixed
   */
  abstract function add();

  /**
   * Delete a message from the queue.
   *
   * @return mixed
   */
  abstract function delete();

}
