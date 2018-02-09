# Message Queue


Welcome to the message queue example. Just like the [linkedin parser](https://github.com/RoySegall/linkedin-python-parser)
this is another home assignment.

## Documentations

### Simple examples
First, get the message queue manager:

```php
<?php
require_once 'vendor/autoload.php';
$queue = new \MessageQueue\MessageQueue();
```

Now, you can start and push messages:
```php
<?php
$message = new \MessageQueue\Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with Pineapple');
$queue->sendMessage($message);
```

In order to get the last message you can do something like:
```php
<?php
$message = $queue->reserveMessage('pizza_hut_dispatch_server');
```

### Message queue worker
Since we don't live in a monolithic world, our queue storage solutions does not
fir to other people.
The message worker can handle several storage and you can acquire them easily:
```php
<?php

$memory = \MessageQueue\QueueWorkerManager::getById('memory');
// RethinkDB and Redis are DBs which suite for real time situation - our
// situation.
$redis = \MessageQueue\QueueWorkerManager::getById('redis');
$rethinkdb = \MessageQueue\QueueWorkerManager::getById('rethinkdb');
```

Pushing a message is also easy:
```php
<?php
$memory = \MessageQueue\QueueWorkerManager::getById('memory');
$message = new \MessageQueue\Message('pizza_hut_dispatch_server', 'new_order', 'actions', 'Pizza with Pineapple');
$memory->add($message);
```

Note: For now, only memory storage is supported.

## Tests
Run tests by:
```bash
bash run_tests.sh
```

