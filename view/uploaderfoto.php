<?php
  require_once ("post.php");
  @session_start();
  $userid = $_REQUEST['nama'];
  $target_dir = "image/";
  $id = $userid."fotoprofil";
  $uploadOk = 1;
  $foto = $_FILES["foto"]["name"];
  $imageFileType = pathinfo($foto,PATHINFO_EXTENSION);
  $target_file = $target_dir . $id.".$imageFileType";
  $post = new post();
  $caption = "mengubah foto profilnya";
  if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["foto"]["tmp_name"]);
          if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not an image.";
      $uploadOk = 0;
    }
    }
    if ($uploadOk == 0) {
      echo "Upload Error.";
    } else {
      if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
      }
      if($uploadOk!=0){
          echo "Sukses";
      }else{
        exit();
      }
  header("Location:home.php?url=profil");
 ?>
