<?php
$link = mysqli_connect('127.0.0.1', 'root', 'P@ssw0rd', 'mywebdb');
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id=$id";
$res = mysqli_query($link, $sql);
$rows = mysqli_fetch_array($res);
$title = $rows['title'];
$main_text = $rows['main_text'];
?>

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
        <h1 class="display-4 text-primary">
          <?php echo $title; ?>
        </h1>
      </div>
      <div class="text-center mb-4">
        <p class="lead">
          <?php echo $main_text; ?>
        </p>
      </div>
      <div class="text-center">
        <?php 
          $images = glob("upload/$id.*");
          if (!empty($images)) {
            echo '<img src="' . $images[0] . '" alt="Image for post" class="img-fluid rounded shadow">';
          } else {
            echo '<p class="text-muted">This post doesnt have an image</p>';
          }
        ?>
      </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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

?>