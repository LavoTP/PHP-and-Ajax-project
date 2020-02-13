<?php 

	include("config.php");

	if (!empty($_POST['update'])) {
		
		if (isset($_POST['id']) && isset($_POST['apartment_name']) && isset($_POST['apartment_address'])) {

			$ap_id = $_POST['id'];
	 		$name = $_POST['apartment_name'];
		    $address = $_POST['apartment_address'];

		    $query = "UPDATE apartment SET name = '$name', address = '$address' WHERE apartment_id = '$ap_id'";
		    $query_result = mysqli_query($connection, $query);
		    if (!$query_result) {
		      die("QUERY FAILED");
		    }else{
		    	echo "Updated successfully";
		    }
		}
	}

	if (!empty($_POST['delete'])) {

		if (isset($_POST['id'])) {

			$ap_id = $_POST['id'];

		    $query = "DELETE FROM apartment WHERE apartment_id = '$ap_id'";
		    $query_result = mysqli_query($connection, $query);
		    
		    if (!$query_result) {
		      die("QUERY FAILED");
		    }else{
		    	echo "Deleted successfully";
		    }
		}
	}

 ?>