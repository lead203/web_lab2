<?php
	include 'elems/init.php';

	if(!empty($_SESSION['auth'])){
		function getPage($link){
			if (isset($_POST['name']) and isset($_POST['description']) and isset($_POST['product']) and isset($_POST['productQuantity'])) {
				$name = $_POST['name'];
				$description = $_POST['description'];
				$product = $_POST['product'];
				$productQuantity = $_POST['productQuantity'];
			} else {
				$name = '';
				$description = '';
				$product = '';
				$productQuantity = '';
			}
			
			ob_start();
			include 'elems/form_recipes.php';
			$content = ob_get_clean();

			include 'elems/layout.php';
		}

		function addPage($link){
			if (isset($_POST['name']) and isset($_POST['description']) and isset($_POST['product']) and isset($_POST['productQuantity'])) {
				$name = mysqli_real_escape_string($link, $_POST['name']);
				$description = mysqli_real_escape_string($link, $_POST['description']);
				$product = mysqli_real_escape_string($link, implode('|', $_POST['product']));
				$productQuantity = mysqli_real_escape_string($link, implode('|', $_POST['productQuantity']));

				$query = "INSERT INTO my_recipes (name, description, product, productQuantity) VALUES ('$name', '$description', '$product', '$productQuantity')";
				mysqli_query($link, $query) or die(mysqli_error($link));

				$_SESSION['message'] = [
					'text' => 'Recipes added successfully',
					'status' => 'success'
				]; 

				header('Location: index.php'); die();
				
			} else {
				return '';
			}
		}

		addPage($link);
		getPage($link);
	} else {
		header('Location: login.php'); die();
	}
	




