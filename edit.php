<?php
session_start();

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'bd.php';
include 'images.php';
$last_id = $_GET['id'];

// $sql = 'CREATE VIEW POSTS_UP AS SELECT POSTS.id, POSTS.title, POSTS.post, POSTS.date_update, POSTS.draft, POSTS.status, IMAGES.name, IMAGES.last_id FROM POSTS INNER JOIN IMAGES ON POSTS.id = IMAGES.last_id';
// $statement = $pdo->prepare($sql);
// $statement->execute();

 $sql = 'SELECT * FROM POSTS_UP where id = :last_id';

// $sql = 'SELECT POSTS.id, POSTS.title, POSTS.post, POSTS.date_update, POSTS.draft, POSTS.status, IMAGES.name, IMAGES.last_id FROM POSTS INNER JOIN IMAGES ON POSTS.id = IMAGES.last_id';

 $statement = $pdo->prepare($sql);
 $statement->bindParam(':last_id', $last_id);
 $statement->execute();
 $result = $statement->FETCHALL(PDO::FETCH_ASSOC);


if (count($result)) {
   foreach($result as $row) { 
   	if ($last_id == $row['id']) {
   	$title = $row['title'];
   	$post = $row['post'];
   	$rst = $row['name'];
   }
  }
 }

if( isset( $_POST['knopka'] ) )
    {
    	$id = $_GET['id'];
    	$title = $_POST['title'];
    	$post = $_POST['post'];
    	$name1 = $name;

    	$sql = 'UPDATE posts_up SET title = :title, post = :post, name = :name WHERE id = :id';
    	$result = $pdo->prepare($sql);
    	// $result->bindParam(':id', $id);
    	// $result->bindParam(':title', $title);
    	// $result->bindParam(':post', $post);
    	// $result->bindParam(':name', $name);
    	$result->execute(array(':id' => $id, ':title' => $title, ':post' => $post,':name' => $name));



    	var_dump($id);
    	echo '<pre>';
    	var_dump($title);
    	var_dump($post);
    	var_dump($name1);
    	echo '</pre>';













  //   	// var_dump($_POST);
  //   	$id = $_GET['id'];
  //   	$title = $_POST['title'];
		// $post = $_POST['post'];
    	
  //       $sql = 'UPDATE POSTS SET title = :title, post = :post, WHERE id = :id';
  //       $result = $pdo->prepare($sql);
  //       $result->bindParam(':id', $id);
  //       $result->bindParam(':title', $title);
  //       $result->bindParam(':post', $post);
  //       $result->execute();
    }



?>
