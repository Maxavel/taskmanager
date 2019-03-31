<?php

function validate_input(){

 foreach ($_POST as $input )
 { 
 	if(empty($input))
 {		
 		$errorMessage = 'Пустые поля';
		include 'errors.php';
		exit;
		}
	   }
	  }

function validate_session()
{
		if(!isset($_SESSION['add_user'])) 
	{ 
		header('Location: /login-form.php');
		exit;
	}
}

// если была произведена отправка формы
    if(isset($_FILES['file'])) {
      $check = can_upload($_FILES['file']);
    
      if($check === true){
        make_upload($_FILES['file']);
        header('Location: index.php');
        // echo "<strong>Файл успешно загружен!</strong>";
      }
      else{
        echo "<strong>$check</strong>";  
      }
    }

    function can_upload($file){
    if($file['name'] == '')
        return 'Вы не выбрали файл.';
    
    if($file['size'] == 0)
        return 'Файл слишком большой.';
    
    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
    
    // если расширение не входит в список допустимых - return
    if(!in_array($mime, $types))
        return 'Недопустимый тип файла.';
    return true;
  }
  
  function make_upload($file){  
    global $name;
    $name = mt_rand(0, 10000) . $file['name'];
    copy($file['tmp_name'], 'uploads/' . $name);
  }

?>