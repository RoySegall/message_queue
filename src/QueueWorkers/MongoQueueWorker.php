<?php

namespace MessageQueue\QueueWorkers;

use MessageQueue\Message;

class MongoQueueWorker extends QueueWorkerBase {

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
