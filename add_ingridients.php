<?php
	include 'elems/init.php';

	if(!empty($_SESSION['auth'])){
		function getPage($link){	
			ob_start();
			include 'elems/form_ingridients.php';
			$content = ob_get_clean();

			include 'elems/layout.php';
		}

		function addPage($link){
			if (isset($_POST['name'])) {
				$name = mysqli_real_escape_string($link, $_POST['name']);

				$query = "INSERT INTO ingridients (name) VALUES ('$name')";
				mysqli_query($link, $query) or die(mysqli_error($link));

				$_SESSION['message'] = [
					'text' => 'Ingridients added successfully',
					'status' => 'success'
				]; 

				header('Location: ingridients.php'); die();
				
			} else {
				return '';
			}
		}

		addPage($link);
		getPage($link);
	} else {
		header('Location: login.php'); die();
	}
	




