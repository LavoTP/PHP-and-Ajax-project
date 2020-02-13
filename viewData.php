<?php

  include("config.php");

  $query = "SELECT * FROM apartment ORDER BY apartment_id";
  $results = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_array($results)) {
    echo "<tr>";
    	echo "<td>{$row['apartment_id']}</td>";
    	echo "<td>{$row['name']}</td>";
    	echo "<td>{$row['address']}</td>";
    	echo "<td>" . "<button class='btn btn-primary update_btn' update_id='{$row['apartment_id']}'>Update</button>" . "</td>";
    	echo "<td>" . "<button class='btn btn-danger real_delete' delete_id='{$row['apartment_id']}'>Delete</button>" . "</td>";
    echo "</tr>";
  }


 ?>
  <script type="text/javascript">
    //function update(id) {
    //  $('#tableData').hide();
    //  $('#update_form').show();   
    //}

   $(document).ready(function() {
     

     $('.update_btn').on('click', function() {
        
        $('#tableData').css("width", "70%");
        $('#update_form').show();

        var id = $(this).attr("update_id");

        $.post("process.php", {id: id}, function(data){
              $('#update_form').html(data);
            });
        });

       
          $('.real_delete').on('click', function() {
            if (confirm("Are you sure you want to delete this apartment?")) {

              var id = $(this).attr("delete_id");
              $.post("update.php", {id:id, delete: 1}, function(data) {
                  alert(data);
              });

           }
          });
      


   });

  </script>