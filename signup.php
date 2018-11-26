<?php
	include 'elems/init.php';

	if(isset($_POST['login']) and isset($_POST['password']) and isset($_POST['password_2'])){
		$login = $_POST['login'];
		$password = $_POST['password'];
		$password2 = $_POST['password_2'];

		$count = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login'");

		if(trim($login == '')){
			$errors[] = 'Введите логин!';
		} elseif (mysqli_num_rows($count) == 1) {
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

		if($password == ''){
			$errors[] = 'Введите пароль!';
		}

		if($password2 != $password){
			$errors[] = 'Второй пароль не совпадает!';
		}

		if (empty($errors)){
			$query = "INSERT INTO `users` (login, password) VALUES ('$login', '$password')";
				mysqli_query($link, $query) or die(mysqli_error($link));

				$_SESSION['message'] = [
					'text' => 'Вы успешно зарегистрированы!',
					'status' => 'success'
				]; 

				header('Location: login.php'); die();
		}
		else{
			$error = array_shift($errors);

			$_SESSION['message'] = [
					'text' => "$error",
					'status' => 'error'
			];
		}
	}

	include 'elems/form_signup.php';
?>



