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

  /**
 * {@inheritdoc}
 */
  function get() {
  }

  /**
   * {@inheritdoc}
   */
  function add(Message $message) {
  }

  /**
   * {@inheritdoc}
   */
  function delete($message_id) {
  }

}
