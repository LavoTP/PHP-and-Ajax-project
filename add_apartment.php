<?php

  include("config.php");

  if (isset($_POST['name']) && isset($_POST['address'])) {

    $name = $_POST['name'];
    $address = $_POST['address'];

    $query = "INSERT INTO apartment(name, address) VALUES('$name', '$address')";
    $query_result = mysqli_query($connection, $query);
    if (!$query_result) {
      die("QUERY FAILED");
    }
  }


 ?>
