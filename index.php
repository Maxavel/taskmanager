<?php 
session_start();

if(!isset($_SESSION['add_user'])) 
{ 
  header('Location: /login-form.php');
  exit;
}

require 'function-index.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Tasks</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">О проекте</h4>
              <p class="text-muted">Данный проект является обучающим и предназначен для того, чтобы изучить большинство аспектов работы языка программирования php.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white"><?php if ($userlogin) { echo 'Вы ' . $userlogin; ?></h4>
              <ul class="list-unstyled">
                <li style="list-style-type: none;"><a href="/logout.php" class="text-white">Выйти</a></li>
                <?php } else { echo 'Пожалуйста, войдите.</h4>'?>
                <li style="list-style-type: none;"><a href="/login-form.php" class="text-white">Войти</a></li>
                <?php }; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Tasks</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Проект Task-manager</h1>
          <p class="lead text-muted">Данный проект является обучающим и предназначен для того, чтобы изучить большинство аспектов работы языка программирования php.</p>
          <p>
            <a href="/create-form.php" class="btn btn-primary my-2">Добавить запись</a>
          </p>
        </div>
      </section>
      <div class="album py-5 bg-light">
      <?php if (count($result)) { ?>
        <?php foreach($result as $row) { ?>
        <?php if ($row['deleted'] == 0) { ?>
        <?php $last_id = $row['id'];?>
        <?php $id = $row['autor_id'];?>
        <?php $status = $row['status']; ?>
        <?php $data = $pdo->prepare('SELECT name FROM images WHERE last_id = :last_id');?>
        <?php $data->execute(array('last_id' => $last_id));?>
        <?php $rst = $data->fetchColumn();?>
        <?php $data = $pdo->prepare('SELECT userlogin FROM user WHERE id = :id');?>
        <?php $data->execute(array('id' => $id));?>
        <?php $autor = $data->fetchColumn();?>
        <div class="container">
          <div class="row" style="display: -webkit-inline-box;">
             <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="uploads/<?php echo $rst;?>">
                <div class="card-body">
                  <p class="card-text">
                    <?php echo($row['title']); ?>
                  </p>
                  <p>
                    <?php echo mb_substr(stripslashes(($row['post'])), 0, 140); ?>
                  </p>
                  <p>
                    Добавлено: <?php echo $row['date_add']; ?>
                  </p>
                  <p>
                    Автор: <?php echo $autor; ?>
                  </p>
                  <p>
                    Статус: <?php echo $status; ?>
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/show-form.php?id=<?php echo $last_id;?>" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                      <a href="/edit-form.php?id=<?php echo $last_id?>" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="/delete.php?id=<?php echo $last_id?>" class="btn btn-sm btn-outline-secondary" onclick="confirm('Вы уверены?')">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
              <?php } ?>
              <?php } else { ?>
                <?php  echo "Нет записей для вывода"; ?>
                  <?php } ?> 
          </div>
        </div>
      </div>
    </main>
    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Наверх</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
