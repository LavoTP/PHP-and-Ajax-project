<?php

include("config.php");

	$search = $_POST['search'];

	if (!empty($search)) {
		$query = "SELECT * FROM apartment WHERE name LIKE '%$search%' OR address LIKE '%$search%' LIMIT 7";
		$search_query = mysqli_query($connection,$query);
		$count = mysqli_num_rows($search_query);

		if (!$search_query) {
			die('QUERY FAILED ' . mysqli_error($connection));
		}

		if ($count <= 0) {
			echo "Sorry no results for {$search}";
		}else{

			while ($row = mysqli_fetch_array($search_query)) {
				echo "<li style='width: 60%;'>" . $row['name'] . "</li>";
			}
		}

	}


 ?>
