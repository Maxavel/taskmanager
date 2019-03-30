<?php
session_start();

if(!isset($_SESSION['add_user'])) 
{ 
  header('Location: /login-form.php');
  exit;
}

include 'bd.php';
include 'images.php';
$last_id = $_GET['id'];

$sql = 'SELECT * FROM POSTS_UP where id = :last_id';
$statement = $pdo->prepare($sql);
$statement->bindParam(':last_id', $last_id);
$statement->execute();
$result = $statement->FETCHALL(PDO::FETCH_ASSOC);

if (count($result)) {
   foreach($result as $row) { 
   	if ($last_id == $row['id']) {
   	$title = $row['title'];
   	$post  = $row['post'];
   	$rst   = $row['name'];
   }
  }
 }

?>