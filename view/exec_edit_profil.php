<?php
require("../../KMS/src/user.php");
  session_start();
    if(isset($_REQUEST['submit'])){
      $user = new user($_SESSION['name']);
      $user->update($_REQUEST['id_user'],$_REQUEST['nama'],$_REQUEST['pekerjaan'],$_REQUEST['no_telfon'],null,$_REQUEST['alamat']);
    }
    header("Location:/../KMS");
 ?>
