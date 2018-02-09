<?php

namespace MessageQueue;

interface MessageInterface {

  /**
   * @return mixed
   */
  public function getMessageType();

  /**
   * @param mixed $MessageType
   *
   * @return MessageInterface
   */
  public function setMessageType($MessageType);

  /**
   * @return mixed
   */
  public function getCategory();

  /**
   * @param mixed $Category
   *
   * @return MessageInterface
   */
  public function setCategory($Category);

  /**
   * @return mixed
   */
  public function getText();

  /**
   * @param mixed $text
   *
   * @return MessageInterface
   */
  public function setText($text);

  /**
   * @return string
   */
  public function getReserverName();

  /**
   * @param string $reserverName
   *
   * @return MessageInterface
   */
  public function setReserverName($reserverName);
}
