<?php
  if (isset($_POST["convert"])) {

    if (is_array($_FILES)) {
      $path = "./images/";
      $file = $_FILES['image']['tmp_name'];
      $source_properties = getimagesize($file);
      $image_type = $source_properties[2];

      if ($image_type == IMAGETYPE_JPEG) {
        $image_resource_id = imagecreatefromjpeg($file);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
        $save = imagejpeg($target_layer, $path . $_FILES['image']['name'] . "_thumb.jpg");

      }elseif ($image_type == IMAGETYPE_GIF) {
        $image_resource_id = imagecreatefromgif($file);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
        $save = imagegif($target_layer, $path . $_FILES['image']['name'] . "_thumb.gif");

      }elseif ($image_type == IMAGETYPE_PNG) {
        $image_resource_id = imagecreatefrompng($file);
        $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
        $save = imagepng($target_layer, $path . $_FILES['image']['name'] . "_thumb.png");
      }
    }
  }

  function fn_resize($image_resource_id, $width, $height){
    $target_width = 200;
    $target_height = 200;
    $target_layer = imagecreatetruecolor($target_width, $target_height);
    imagecopyresampled($target_layer, $image_resource_id, 0,0,0,0, $target_width, $target_height, $width, $height);
    return $target_layer;
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Image Resize</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>
  <body>
      <div class="container">
        <div class="row justify-content-center mt-4">
          <form name="formresize" action="" method="post" enctype="multipart/form-data">
            <input type="file" class="form-control" name="image" value="">
            <input type="submit" class="btn btn-success" name="convert" value="Resize image">
          </form>
        </div>
      </div>
  </body>
</html>
