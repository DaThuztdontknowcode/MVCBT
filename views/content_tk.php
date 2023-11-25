<div class="content">

  <?php

  require_once __DIR__ . '/../Ctrlers/controller.php';
  $controller = new Controller();

  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $page = is_numeric($page) ? $page : 1;
  $from = ($page - 1) * ITEM_PER_PAGE;

  $userId = isset($_GET['userId']) ? $_GET['userId'] : "";

  $postCount = $controller->getPostCount(isset($_GET['keyword']) ? $_GET['keyword'] : "", $userId);
  $total = ceil($postCount / ITEM_PER_PAGE);

  $result = $controller->getListPost(isset($_GET['keyword']) ? $_GET['keyword'] : "", $from, $userId);

  foreach ($result as $post) {
    echo "
    <div class='post-item card'>
      <a href='chitiet.php?post=" . $post->getId() . "'>
        <div class='post-inner'>
          <h3>Title: " . $post->getTitle() . "</h3>
          <h5>Author: " . $controller->getUserByUserId($post->getUserId())->getName() . "</h5>
          <p>" .  $post->getBody() . "</p>
        </div>
      </a>
    </div>
  ";
  }

  echo "<br/>";
  echo "<div class='pager'>";
  for ($i = 1; $i <= $total; $i++) {
    if ($i != $page) {
      echo "<a href='?page=" . $i . (isset($_GET['keyword']) ? "&keyword=" . $_GET['keyword'] : "") . (isset($_GET['userId']) ? "&userId=" . $_GET['userId'] : "") . "' onclick='showPost();'>$i</a>";
    } else
      echo "<span>" . $i . "</span>";
  }
  echo "</div>";

  ?>
</div>

<style>
  a {
    display: inline-block;
    box-sizing: border-box;
  }

  .post-item {
    background: rgba(0, 0, 0, 0.1);
    margin: 12px 8px;
  }

  .post-item:hover {
    background: rgba(0, 0, 0, 0.2);
  }

  .post-item>a {
    text-decoration: none;
    color: #000;
    width: 100%;
    padding: 16px;
  }

  .pager {
    text-align: center;
    background-color: #eee;
    padding: 12px 8px;
  }

  .pager>a,
  .pager>span {
    color: #6240b8;
    margin: 0 8px;
  }

  .pager>span {
    color: black;
    font-weight: bolder;
  }
</style>

<script>
  document.querySelector('select').value = '<?php echo (isset($_GET['userId']) ? $_GET['userId'] : ""); ?>';
</script>