<?php

namespace MessageQueue;

/**
 * A simple message instance.
 *
 * @package MessageQueue
 *
 * todo: move to a service.
 */
class Message implements MessageInterface {

  /**
   * @var string
   */
  protected $MessageType;

  /**
   * @var string
   */
  protected $Category;

  /**
   * @var string
   */
  protected $text;

  /**
   * @var string
   */
  protected $reserverName;

  /**
   * Message constructor.
   *
   * @param string $reserver_name
   * @param string $message_type
   * @param string $category
   * @param string $text
   */
  public function __construct($reserver_name, $message_type = NULL, $category = NULL, $text = NULL) {
    $this
      ->setReserverName($reserver_name)
      ->setMessageType($message_type)
      ->setCategory($category)
      ->setText($text);
  }

  /**
   * {@inheritdoc}
   */
  public function getMessageType() {
    return $this->MessageType;
  }

  /**
   * {@inheritdoc}
   */
  public function setMessageType($MessageType) {
    $this->MessageType = $MessageType;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCategory() {
    return $this->Category;
  }

  /**
   * {@inheritdoc}
   */
  public function setCategory($Category) {
    $this->Category = $Category;

    return $this;
  }

  /**
   * @return mixed
   */
  public function getText() {
    return $this->text;
  }

  /**
   * {@inheritdoc}
   */
  public function setText($text) {
    $this->text = $text;

    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getReserverName() {
    return $this->reserverName;
  }

  /**
   * {@inheritdoc}
   */
  public function setReserverName($reserverName) {
    $this->reserverName = $reserverName;

    return $this;
  }

}
