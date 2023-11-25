<?php
  require_once __DIR__ . "/../../modules/db_module.php";
  require_once __DIR__ . "/../DataTransferObject/user.php";
;

  class UserModel {
    public function getListUser() {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select * from tbl_users");
      $data = array();

      while ($row = mysqli_fetch_assoc($result)) {
        $user = new User($row['id'], $row['name']);
        array_push($data, $user);
      }

      closeConnection($link);
      return $data;
    }
    public function getUserByUserId($userId) {
      $link = null;
      createConnection($link);

      $result = excuteQuery($link, "select * from tbl_users where id = $userId");
      $data = array();

      $row = mysqli_fetch_row($result);
      $user = new User($row[0], $row[1]);

      closeConnection($link);
      return $user;
    }
  }

?>