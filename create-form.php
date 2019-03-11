<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Create Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" enctype="multipart/form-data" action="create.php" method="post">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>
        <label for="inputTitle" class="sr-only">Название</label>
        <input type="text" id="inputTitle" class="form-control" placeholder="Название" required name="title">
        <label for="inputText" class="sr-only">Описание</label>
        <textarea name="post" class="form-control" cols="30" rows="10" placeholder="Описание" name="post"></textarea>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="file" name="postfile">
        <label>
            <input type="hidden" name="draft" value="0">
            <input id="check_draft" type="checkbox" name="draft" value="1" >Черновик
          </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
