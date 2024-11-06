<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Митрофанов А.В.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="bg-light">
    <div class="container my-5">
      <div class="text-center mb-4">
        <h1 class="display-4 fw-bold text-primary">Митрофанов А.В.</h1>
        <p class="lead text-muted">Я аналитик WAF. PTAF PTAF PTAF</p>
      </div>

      <ul class="list-group list-group-flush shadow-sm mb-4">
        <li class="list-group-item">Отдел: ОТП</li>
        <li class="list-group-item">Возраст: 19</li>
        <li class="list-group-item">Пол: Мужской</li>
      </ul>
      <div class="row g-4 mb-4">
        <div class="col-md-6">
          <div class="p-3 bg-white rounded shadow-sm">
            <h5 class="fw-bold text-secondary">Ангара ТОП</h5>
            <p class="text-muted">Кто не с нами тот под нам</p>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <img src="image/image.jpeg" alt="light wight baby" class="img-fluid rounded shadow-sm">
        </div>
      </div>
      <div class="text-center">
        <button onclick="showImage()" class="btn btn-outline-primary mb-3">Покажи давай да ле</button>
        <img src="image/images_btn.jfif" alt="" id="image_btn" class="img-fluid rounded d-none mt-3">
      </div>
    </div>

    <div class="container my-5">
      <div class="bg-white p-4 rounded shadow-sm">
        <h2 class="hello text-primary mb-3">Привет, <?php echo $_COOKIE['User']; ?></h2>
        <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
          <div class="mb-3">
            <input type="text" class="form-control" name="title" placeholder="Ваш заголовок поста" required>
          </div>
          <div class="mb-3">
            <textarea name="text" class="form-control" rows="5" placeholder="Введите текст здесь" required></textarea>
          </div>
          <div class="mb-3">
            <input type="file" name="file" />
          </div>
          <button type="submit" class="btn btn-success w-100" name="submit">Опубликовать пост!</button>
        </form>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/button.js"></script>
  </body>
</html>


<?php
require_once('dbtest.php');

$link = mysqli_connect('127.0.0.1', 'root', 'P@ssw0rd', 'mywebdb');

if (!$link) {
  print "connection unsuccessful";
}

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $main_text = $_POST['text'];

  if (!$title || !$main_text) die ('Please fill out every form');

  $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

  if(!$link->query($sql)) die("Could not publish the post");
}

$result = mysqli_query($link, "SELECT MAX(id) AS max_id FROM posts");
$row = mysqli_fetch_assoc($result);
$new_id = $row['max_id'];

if (!empty($_FILES["file"])) {
  $allowed_types = ["image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png"];
  if (in_array($_FILES["file"]["type"], $allowed_types) && $_FILES["file"]["size"] < 102400) {
      $upload_path = "upload/" . $new_id . '.' . pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
      if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
          echo "File uploaded to: " . $upload_path;
      } else {
          echo "File upload failed!";
      }
  } else {
      echo "Invalid file type or file size exceeded!";
  }
}

?>