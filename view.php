<?php
	include 'elems/init.php';

	if(!empty($_SESSION['auth'])){
		function getPage($link){
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$query = "SELECT * FROM my_recipes WHERE id=$id";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));
				$page = mysqli_fetch_assoc($result);

				if($page) {
					if (isset($_POST['name']) and isset($_POST['description']) and isset($_POST['product']) and isset($_POST['productQuantity'])) {
				 		$name = $_POST['name'];
				 		$description = $_POST['description'];
				 		$product = $_POST['product'];
				 		$productQuantity = $_POST['productQuantity'];
					} else {
						$name = $page['name'];
						$description = $page['description'];
						$product = $page['product'];
						$productQuantity = $page['productQuantity'];
					}

					ob_start();
					include 'elems/form_view.php';
					$content = ob_get_clean();	

				} else {
					$content = 'Page not found';
				}
			} else {
				$content = 'Page not found';
			}

			include 'elems/layout.php';
		}

		function addPage($link){
			if (isset($_POST['title']) and isset($_POST['url']) and isset($_POST['text'])) {
				$title = mysqli_real_escape_string($link, $_POST['title']);
				$url = mysqli_real_escape_string($link, $_POST['url']);
				$text = mysqli_real_escape_string($link, $_POST['text']);

				if (isset($_GET['id'])) {
					$id = $_GET['id'];

					$query = "SELECT * FROM pages WHERE id='$id'";
					$result = mysqli_query($link, $query) or die(mysqli_error($link));
					$page = mysqli_fetch_assoc($result);

					if ($page['url'] !== $url) {
						$query = "SELECT COUNT(*) as count FROM pages WHERE url='$url'";
				 		$result = mysqli_query($link, $query) or die(mysqli_error($link));
						$isPage = mysqli_fetch_assoc($result)['count'];

						if ($isPage == 1) {
							$_SESSION['message'] = [
								'text' => 'Page with this url exists!',
								'status' => 'error'
							];
						}
					}

					$query = "UPDATE pages SET title='$title', url='$url', text='$text' WHERE id=$id";
					mysqli_query($link, $query) or die(mysqli_error($link));

					$_SESSION['message'] = [
						'text' => 'Page edited successfully',
						'status' => 'success'
					]; 

					header('Location: /admin/'); die();
				}
			} else {
				return '';
			}
		}

		addPage($link);
		getPage($link);
	} else {
		header('Location: login.php'); die();
	}