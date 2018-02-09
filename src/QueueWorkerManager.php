<?php

namespace MessageQueue;
use MessageQueue\QueueWorkers\QueueWorkerBase;
use MessageQueue\QueueWorkers\QueueWorkerException;

/**
 * Class QueueWorkerManager
 *
 * The queue worker manager initiate the worker you need for you by the logic
 * that's suites you.
 *
 * @package MessageQueue
 *
 * todo: define as a service.
 */
class QueueWorkerManager {

  /**
   * @var array
   *
   * List of mappers.
   *
   * todo: move to plugin type system.
   */
  protected $mappers = [
    'memory' => '\MessageQueue\QueueWorkers\SimpleQueueWorker',
    'mysql' => '\MessageQueue\QueueWorkers\MySqlQueueWorker',
    'redis' => '\MessageQueue\QueueWorkers\RedisQueueWorker',
    'mongodb' => '\MessageQueue\QueueWorkers\MongoQueueWorker',
    'rethinkdb' => '\MessageQueue\QueueWorkers\RethinkDbQueueWorker',
    'memcache' => '\MessageQueue\QueueWorkers\MemcacheQueueWorker',
  ];

  /**
   * Get a queue worker.
   *
   * @param $id
   *   The ID of the queue worker.
   *
   * @return QueueWorkerBase
   *   The queue worker instance.
   *
   * @throws QueueWorkerException
   */
  public function getById($id) {

    if (!in_array($id, array_keys($this->mappers))) {
      throw new QueueWorkerException(sprintf('The %s queue worker does not exists.', $id));
    }

    return new $this->mappers[$id];
  }

}
