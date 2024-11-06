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
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 text-center p-4 border rounded bg-white shadow-sm">
          
          <h1 class="mb-4 text-primary">Posts Page</h1>
          
          <?php if (!isset($_COOKIE['User'])) { ?>
            <p class="lead">Please, <a href="/registration.php" class="text-decoration-none">Sign Up</a> or <a href="/login.php" class="text-decoration-none">Sign In</a>!</p>
          <?php } else { 
              $link = mysqli_connect('127.0.0.1', 'root', 'P@ssw0rd', 'mywebdb');
              $sql = "SELECT * FROM posts";
              $res = mysqli_query($link, $sql);
          ?>
          <div class="text-start mt-4">
            <h3 class="mb-3">Posts:</h3>
            <?php if (mysqli_num_rows($res) > 0) { ?>
              <ul class="list-group list-group-flush">
                <?php while ($post = mysqli_fetch_array($res)) { ?>
                  <li class="list-group-item">
                    <a href="/posts.php?id=<?= $post['id'] ?>" class="text-decoration-none"><?= $post['title'] ?></a>
                  </li>
                <?php } ?>
              </ul>
            <?php } else { ?>
              <p class="text-muted">No Posts!</p>
            <?php } ?>
          </div>
          <?php } ?>

        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
