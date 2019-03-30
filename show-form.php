<?php
session_start();
include 'show.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Show</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
    </style>
  </head>
  <body>
    <div class="form-wrapper text-center">
      <img src="uploads/<?php echo $rst; ?>" alt="" width="400">
      <h2><?php echo $title ?></h2>
      <p>
        <?php echo $post; ?>
      </p>
      <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
    </div>
  </body>
</html>