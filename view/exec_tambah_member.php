<?php
    if(isset($_REQUEST['submit'])){
      $nama = $_REQUEST['nama'];
      $jenis_pengenal = $_REQUEST['jenis_identitas'];
      $no_pengenal = $_REQUEST['no_identitas'];
      $pekerjaan = $_REQUEST['pekerjaan'];
      $no_telfon = $_REQUEST['no_telfon'];
      $alamat = $_REQUEST['alamat'];
      $password = $_REQUEST['password'];
      require("../../KMS/src/user.php");
      require("../../KMS/src/maindb.php");
      session_start();
      $user = $_SESSION['username'];
      $arr_owner = $user->read();
      $new_user = new user($user->nama."_".$_REQUEST['username']);
      $db = new maindb($new_user->nama);
      $new_user->create($new_user->nama,$nama,$jenis_pengenal,$no_pengenal,$pekerjaan,$no_telfon,null,$password,$alamat);
      $db->create($user->nama,$new_user->nama,2,$new_user->nama,$new_user->nama);
      header("Location:/../KMS/home.php?url=tambah_member");
    }
 ?>
