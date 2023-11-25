<?php
  class Post {
    private $userId;
    private $id;
    private $title;
    private $body;

    public function getUserId() { return $this->userId; }
    public function getId() { return $this->id; }
    public function getTitle() { return $this->title; }
    public function getBody() { return $this->body; }

    public function __construct($userId, $id, $title, $body)
    {
      $this->userId = $userId;
      $this->id = $id;
      $this->title = $title;
      $this->body = $body;
    }

    public function __toString()
    {
      return "Post($this->userId, $this->id, $this->title, $this->body)";
    }
  }
?>