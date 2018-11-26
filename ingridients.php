<?php
	include 'elems/init.php';

	if(!empty($_SESSION['auth'])){
		function showPageTable($link){
		$query = "SELECT * FROM ingridients";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

		ob_start();
		include 'elems/title_ingridients.php';
		$content = ob_get_clean();

		if(mysqli_num_rows($result) == 0){
			$content .= '<span class="no_table">Вы пока не добавили не одного ингредиента!</span>';
		} else {		
			$content .= '<table class="table">
				<tr>
					<th>Меню</th>
					<th class="action">Действие</th>
				</tr>';
				foreach ($data as $page) {
					$content .= "<tr>
						<td>{$page['name']}</td>
						<td class=\"action\"><a href=\"?delete={$page['id']}\"><img src=\"/img/del.svg\"></a></td>
					</tr>";
				}
					
			$content .= '<table>';
		}

		include 'elems/layout.php';
	}

		function deletePage($link){
			if (isset($_GET['delete'])) {
				$id = $_GET['delete'];
				$query = "DELETE FROM ingridients WHERE id=$id";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));

				$_SESSION['message'] = [
					'text' => "Page deleted successfully",
					'status' => 'success'
				];
			}
		}

		deletePage($link);

		showPageTable($link);
	} else {
		header('Location: login.php'); die();
	}




