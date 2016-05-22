<?php
include "src/user.php";
  if(isset($_REQUEST['submit'])){
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];
          $conn = new mysqli('127.0.0.1','root','root','kms') or die('gagal konek');
          if($conn->query("CALL SP_Login('".$username."','".$password."')")){
            session_start();
            $user = new user($username);
            $_SESSION['username'] = $user;
            $_SESSION['name'] = $username;
            header("Location:home.php?url=utama");
          }else{
           header("location:index.php");
            echo "username/password salah";
          }
  }

 ?>
