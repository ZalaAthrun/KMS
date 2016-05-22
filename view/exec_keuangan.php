<?php
require("../../KMS/src/user.php");
require("../../KMS/src/keuangan.php");
  if(isset($_REQUEST['submit'])){
    session_start();
    $user = $_SESSION['username'];
    $username = $user->read();
    $keuangan = new keuangan($username['id_user']);
    $jenis = $_REQUEST['jenis'];
    $jumlah = $_REQUEST['jumlah'];
    $keterangan = $_REQUEST['ket'];
    $keuangan->input($username['id_user'],$jenis,$jumlah,$keterangan);
    header("Location:/../KMS/home.php?url=analisa_pemasukan");
  }
 ?>
