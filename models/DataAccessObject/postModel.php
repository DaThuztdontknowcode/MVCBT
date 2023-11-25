<?php
  require_once __DIR__ . "/../../modules/db_module.php";
  require_once __DIR__ . "/../DataTransferObject/post.php";
;

  class PostModel {
    public function getPostList() {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select * from tbl_post");
      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $post = new Post($row['userId'], $row['id'], $row['title'], $row['body']);
        array_push($data, $post);
      }

      closeConnection($link);
      return $data;
    }

    public function getPostCount() {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select count(*) from tbl_posts");
      $data = mysqli_fetch_row($result);

      closeConnection($link);
      return $data[0];
    }

    public function getPostBelongUserCount() {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select count(*) from tbl_posts where userId = " . $_GET['user']);
      $data = mysqli_fetch_row($result);

      closeConnection($link);
      return $data[0];
    }

    public function getPostCountByKeyword($keyword) {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select count(*) from tbl_posts where title like '%" . $keyword ."%'");
      $data = mysqli_fetch_row($result);

      closeConnection($link);
      return $data[0];
    }

    public function getPostCountByUserId($userId) {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select count(*) from tbl_posts where userId =" . $userId);
      $data = mysqli_fetch_row($result);

      closeConnection($link);
      return $data[0];
    }

    public function getPostCountByKeywordAndUserId($keyword, $userId) {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select count(*) from tbl_posts where title like '%" . $keyword ."%' and userId =" . $userId);
      $data = mysqli_fetch_row($result);

      closeConnection($link);
      return $data[0];
    }

    public function getListPostWithLimit($from) {
      $link = null;
      createConnection($link);

      $query = "select * from tbl_posts limit " . $from . ", " . ITEM_PER_PAGE;
      $result = excuteQuery($link, $query);
      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $post = new Post($row['userId'], $row['id'], $row['title'], $row['body']);
        array_push($data, $post);
      }

      closeConnection($link);
      return $data;
    }

    public function getListPostByKeywordWithLimit($keyword, $from) {
      $link = null;
      createConnection($link);

      $query = "select * from tbl_posts where title like '%" . $keyword ."%' limit " . $from . ", " . ITEM_PER_PAGE;
      $result = excuteQuery($link, $query);
      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $post = new Post($row['userId'], $row['id'], $row['title'], $row['body']);
        array_push($data, $post);
      }

      closeConnection($link);
      return $data;
    }

    public function getListPostByUserIdWithLimit($from, $userId) {
      $link = null;
      createConnection($link);

      $query = "select * from tbl_posts where userId = " . $userId ." limit " . $from . ", " . ITEM_PER_PAGE;
      $result = excuteQuery($link, $query);
      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $post = new Post($row['userId'], $row['id'], $row['title'], $row['body']);
        array_push($data, $post);
      }

      closeConnection($link);
      return $data;
    }

    public function getListPostByKeywordAndUserIdWithLimit($keyword, $from, $userId) {
      $link = null;
      createConnection($link);

      $query = "select * from tbl_posts where userId = " . $userId ." and title like '%" . $keyword ."%' limit " . $from . ", " . ITEM_PER_PAGE;
      $result = excuteQuery($link, $query);
      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $post = new Post($row['userId'], $row['id'], $row['title'], $row['body']);
        array_push($data, $post);
      }

      closeConnection($link);
      return $data;
    }
  }
?>