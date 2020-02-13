<?php 

  include("config.php");

  if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "DELETE FROM apartment WHERE apartment_id = '$id'";
    $query_result = mysqli_query($connection, $query);
    if (!$query_result) {
      die("QUERY FAILED");
    }
  }

 ?>