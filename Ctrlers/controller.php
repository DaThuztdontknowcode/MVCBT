<?php
  require_once __DIR__ . "/../models/DataAccessObject/postModel.php";
  require_once __DIR__ . "/../models/DataAccessObject/userModel.php";
  
  class Controller {
    public $postModel;
    public $userModel;

    public function __construct() {
      $this->postModel = new PostModel();
      $this->userModel = new UserModel();
    }

    public function getPostCount($keyword, $userId) {
      if ($keyword && !$userId)
        return $this->postModel->getPostCountByKeyword($keyword);
      else if ($userId && !$keyword)
        return $this->postModel->getPostCountByUserId($userId);
      else if ($keyword && $userId)
        return $this->postModel->getPostCountByKeywordAndUserId($keyword, $userId);
      else
        return $this->postModel->getPostCount();
    }

    public function getListPost($keyword, $from, $userId) {
      if ($keyword && !$userId)
        return $this->postModel->getListPostByKeywordWithLimit($keyword, $from);
      else if ($userId && !$keyword)
        return $this->postModel->getListPostByUserIdWithLimit($from, $userId);
      else if ($keyword && $userId)
        return $this->postModel->getListPostByKeywordAndUserIdWithLimit($keyword, $from, $userId);
      else
        return $this->postModel->getListPostWithLimit($from);
    }

    public function renderListOptionUser() {
      foreach ($this->userModel->getListUser() as $user) {
        echo "<option value='" . $user->getId() . "'>" . $user->getName() . "</option>";
      }
    }

    public function getUserByUserId($userId) {
      return $this->userModel->getUserByUserId($userId);
    }
  }

?>