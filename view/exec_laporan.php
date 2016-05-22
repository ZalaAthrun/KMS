<?php
require("../../KMS/src/user.php");
require("../../KMS/src/laporan.php");
  if(isset($_REQUEST['submit'])){
    session_start();
    $user = $_SESSION['username'];
    $username = $user->read();
    $laporan = new laporan();
    $subjek = $_REQUEST['subjek'];
    $keluhan = $_REQUEST['keluhan'];
    $laporan->insert_laporan($username['id_user'],$username['nama'],$subjek,$keluhan);
    header("Location:/../KMS/home.php?url=laporan_member");
  }
?>
