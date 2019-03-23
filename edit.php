<?php
session_start();

include 'bd.php';
include 'images.php';
$last_id = $_GET['id'];

// Создание представления

// $sql = 'CREATE VIEW POSTS_UP AS SELECT POSTS.id, POSTS.title, POSTS.post, POSTS.date_update, POSTS.draft, POSTS.status, IMAGES.name, IMAGES.last_id FROM POSTS INNER JOIN IMAGES ON POSTS.id = IMAGES.last_id';
// $statement = $pdo->prepare($sql);
// $statement->execute();

 $sql = 'SELECT * FROM POSTS_UP where id = :last_id';

// join для связывания

// $sql = 'SELECT POSTS.id, POSTS.title, POSTS.post, POSTS.date_update, POSTS.draft, POSTS.status, IMAGES.name, IMAGES.last_id FROM POSTS INNER JOIN IMAGES ON POSTS.id = IMAGES.last_id';

 $statement = $pdo->prepare($sql);
 $statement->bindParam(':last_id', $last_id);
 $statement->execute();
 $result = $statement->FETCHALL(PDO::FETCH_ASSOC);


// Отправляем циклом на вывод
if (count($result)) {
   foreach($result as $row) { 
   	if ($last_id == $row['id']) {
   	$title = $row['title'];
   	$post = $row['post'];
   	$rst = $row['name'];
   }
  }
 }


// Если нажата кнопка апдейта
if( isset( $_POST['submit'] ) )
    {
    	$id = $_GET['id'];
    	$title = $_POST['title'];
    	$post = $_POST['post'];
      $last_id = $id;

      $sql = 'UPDATE posts SET title = :title, post = :post WHERE id = :id';
    	$result = $pdo->prepare($sql);
    	$result->execute(array(':id' => $id, ':title' => $title, ':post' => $post));

    	$sql = 'UPDATE images SET name = :name WHERE last_id = :id';
    	$result = $pdo->prepare($sql);
    	$result->execute(array(':id' => $id, ':name' => $name ));
    	
    }

?>
