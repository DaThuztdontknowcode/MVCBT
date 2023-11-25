<div>
  <input type="text" id="searchInput" placeholder="Search...">
  <button onclick="searchPosts()">Search</button>
</div>

<script>
  function searchPosts() {
    let keyword = document.getElementById("searchInput").value;
    let userPath = '<?php if(isset($_GET['userId'])) echo "&userId=" . $_GET['userId']; ?>';
    let link = "./views/content_tk.php?page=1&keyword=" + keyword + userPath;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.querySelector(".content").innerHTML = this.responseText;
      }
    }
    xmlhttp.open('GET', link, true);
    xmlhttp.send();
  }
</script>
