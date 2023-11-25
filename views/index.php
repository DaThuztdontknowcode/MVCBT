<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
    .container-fluid {
      display: flex;
      flex-direction: column;
      height: 100vh; /* 100% of the viewport height */
    }

    .banner {
      flex: 0 0 auto; /* Do not grow, do not shrink, use auto size */
      background-color: #696969;
      height: 100px;
    }

    .menu {
      flex: 0 0 auto;
      background-color: #f8f9fa;
      padding: 15px;
    }

    .lmenu {
      flex: 0 0 auto;
      background-color: #e9ecef;
      padding: 15px;
    }

    .content {
      display: flex;
      flex: 1 1 auto; /* Grow, shrink, and use all available space */
    }

    .col-md-3,
    .col-md-9 {
      padding: 15px;
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="banner"></div>
    <div class="menu">
      <?php include_once "./views/Search.php"; ?>
    </div>
    <div class="content">
      <div class="col-md-3 lmenu">
        <div class="my-3">
          <p>Người đăng bài:</p>
          <?php include_once "./views/select_author.php" ?>
        </div>
      </div>
      <div class="col-md-9">
        <?php include_once "./views/content_tk.php"; ?>
      </div>
    </div>
  </div>

</body>

</html>
