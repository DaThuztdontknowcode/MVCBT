<?php

require_once __DIR__ . '/config.php';

function createConnection(&$link)
{
  $link = mysqli_connect(HOST, USER, PASSWORD, DB);
  if (mysqli_connect_errno()) {
    echo "Lỗi kết nối đến máy chủ" . mysqli_connect_error();
    exit();
  }
}

function excuteQuery($link, $query)
{
  $result = mysqli_query($link, $query);
  return $result;
}

function excuteNonQuery($link, $query)
{
  $result = mysqli_query($link, $query);
  return $result;
}

function closeConnectionNFreeResult($link, $result)
{
  try {
    mysqli_close($link);
    mysqli_free_result($result);
  } catch (TypeError $e) {
    echo $e;
  }
}

function closeConnection($link)
{
  try {
    mysqli_close($link);
  } catch (TypeError $e) {
    echo $e;
  }
}
