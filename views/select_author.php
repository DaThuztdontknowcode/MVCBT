<div>
  <select name="" id="" onchange="showPostofUser(this.value)">
    <option value="">All users</option>
    <?php
    include_once __DIR__ . "/../Ctrlers/controller.php";

    $controller = new Controller();

    $controller->renderListOptionUser();

    ?>
  </select>
</div>

<script>
  function showPostofUser(userId) {
    let userPath = userId ? ("&userId=" + userId) : "";
    let keywordPath = '<?php if(isset($_GET['keyword'])) echo $_GET['keyword'] ? "&keyword=" . $_GET['keyword'] : ""; ?>';
    let link = "./views/content_tk.php?page=1" + keywordPath + userPath;

    console.log(link);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 & this.status == 200) {
        document.querySelector(".content").innerHTML = this.responseText;
      }
    }
    xmlhttp.open('GET', link, true);
    xmlhttp.send();
  }
</script>