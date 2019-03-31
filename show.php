<?php
session_start();

include 'bd.php';
include 'function.php';

validate_session();

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