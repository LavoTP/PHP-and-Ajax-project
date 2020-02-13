<?php 


   include("config.php");

 	if (isset($_POST['id'])) {

 		$id = mysqli_real_escape_string($connection, $_POST["id"]);
 		
 		 $query = "SELECT * FROM apartment WHERE apartment_id = '$id'";
		  $results = mysqli_query($connection, $query);

		  while ($row = mysqli_fetch_array($results)) {
		   
	    	echo '<input type="text" class="form-control mb-2 upd-text" data_id="'.$row["apartment_id"].'" value="'.$row["name"].'">';
	    	echo '<input type="text" class="form-control mb-2 upd-address" value="'.$row["address"].'">';
	    	echo '<input type="button" class="btn btn-success mr-3 real_update" value="Update">';
	    	echo '<input type="button" class="btn btn-secondary real_cancel" value="Cancel">';

    	}


 	}


 ?>

 <script type="text/javascript">
 	
 	$(document).ready(function() {

 		$('.real_update').on('click', function() {
 			//alert("still work");
 			var id = $('.upd-text').attr("data_id");
	 		var apartment_name = $('.upd-text').val();
	 		var apartment_address = $('.upd-address').val();
	 		//var real_update = "real_update";

 			$.post("update.php", {id:id, apartment_name:apartment_name, apartment_address:apartment_address, update: 1}, function(data) {
 				alert(data);
 				$('#update_form').hide();
 				$('#tableData').css("width", "100%");
 			});
 		});

 		$('.real_cancel').on('click', function() {
 			$('#update_form').hide();
 			$('#tableData').css("width", "100%");
 		});

 	});

 </script>