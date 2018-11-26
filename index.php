<?php
	include 'elems/init.php';

	if(!empty($_SESSION['auth'])){
		function showPageTable($link){
			$query = "SELECT id, name, description FROM my_recipes";
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

			ob_start();
			include 'elems/title_recipes.php';
			$content = ob_get_clean();

			if(mysqli_num_rows($result) == 0){
				$content .= '<span class="no_table">У вас пока нет не одного рецепта!</span>';
			} else {	
				$content .= '<table class="table">
					<tr>
						<th>Рецепт</th>
						<th>Описание</th>
						<th class="action">Действие</th>
					</tr>';
					foreach ($data as $page) {
						//echo mb_substr($page['description'], 0, 100);

						$content .= "<tr>
							<td>{$page['name']}</td>
							<td>".mb_substr($page['description'], 0, 40)."...</td>
							<td class=\"action\">
								<a href=\"view.php?id={$page['id']}\"><img src=\"/img/eye.svg\"></a>
								<a href=\"?delete={$page['id']}\"><img src=\"/img/del.svg\"></a>
							</td>
						</tr>";
				}

				$content .= '<table>';
			}

			include 'elems/layout.php';
		}

		function deletePage($link){
			if (isset($_GET['delete'])) {
				$id = $_GET['delete'];
				$query = "DELETE FROM my_recipes WHERE id=$id";
				$result = mysqli_query($link, $query) or die(mysqli_error($link));

				$_SESSION['message'] = [
					'text' => "Recipes deleted successfully",
					'status' => 'success'
				];
			}
		}

		deletePage($link);

		showPageTable($link);
	} else {
		header('Location: login.php'); die();
	}