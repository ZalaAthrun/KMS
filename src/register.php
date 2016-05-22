<?php
    if(isset($_POST['submit'])){
      require("user.php");
      require("kost.php");
      require("maindb.php");
      $username = $_REQUEST['username'];
      $nama = $_REQUEST['fname']." ".$_REQUEST['lname'];
      $password = $_REQUEST['password'];
      $jenis_pengenal = $_REQUEST['jenis_pengenal'];
      $no_pengenal = $_REQUEST['no_pengenal'];
      $pekerjaan = $_REQUEST['pekerjaan'];
      $no_telfon= $_REQUEST['no_telfon'];
      $alamat = $_REQUEST['alamat'];
      $user = new user($username);
      $kost = new kost($username);
      $db = new maindb($username);
      if(
        $user->create($username,$nama,$jenis_pengenal,$no_pengenal,$pekerjaan,$no_telfon,null,$password,$alamat)
        &&
        $kost->create($username,null,null,null)
        &&
        $db->create($username,$username,1,null,null)
      ){
        header("Location:/KMS/");
      }else{
        echo "gagal";
        header("Location:/KMS/register.html");
      }
    }
 ?>
