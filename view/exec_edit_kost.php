<?php
  require("../../KMS/src/user.php");
  require("../../KMS/src/kost.php");
    session_start();
    $user = $_SESSION['username'];
    $username = $user->read();
    $kost = new kost('$username[id_user]');
    if(isset($_REQUEST['submit']) && $_REQUEST['edit']=='false'){
        $kost->create($username['id_user'],$_REQUEST['nama'],$_REQUEST['alamat'],
        $_REQUEST['deskripsi']);
        echo "Disimpan";
        exit();
    }


 ?>
