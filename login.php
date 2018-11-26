<?php
	include 'elems/init.php';

	if(isset($_POST['login']) and isset($_POST['password'])){
		$login = $_POST['login'];
		$password = $_POST['password'];

		$count = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

		if(mysqli_num_rows($count) == 0){
			$_SESSION['message'] = [
				'text' => "Не удается войти.<br>Пожалуйста, проверьте правильность написания логина и пароля.",
				'status' => 'error'
			];
			
			include 'elems/form_login.php';

		} else {
			$_SESSION['auth'] = true;

			$_SESSION['message'] = [
				'text' => "You login successfully",
				'status' => 'success'
			];

			header('Location: index.php'); die();
		}
	} else {
		include 'elems/form_login.php';
	}