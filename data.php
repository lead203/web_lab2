<?php
	include 'elems/init.php';

	$query = "SELECT * FROM ingridients";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

	foreach ($data as $ingridients) {
		echo '<option>'.$ingridients['name'].'</option>'; 
	}
?>