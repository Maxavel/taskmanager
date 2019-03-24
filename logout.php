<?php
session_start();
unset($_SESSION['last_id']);
session_destroy();
header('Location: login-form.php');

?>