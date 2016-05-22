<?php
require("src/user.php");
require("src/maindb.php");
session_start();
    $user = $_SESSION['username'];
    $username = $user->read();
    $maindb = new maindb($username['id_user']);
    $level = $maindb->get_level($username['id_user']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>KMS - Home</title>
    <link rel="stylesheet" type="text/css" href="/Semantic/semantic.css">
    <script src="/Semantic/semantic.js"></script>
    <style media="screen">
      .hbody{
          width: 80%;
          float: left;
          margin-left: 20%;
      }
      .hleft{
          width : 20%;
          float:left;
          position: fixed;
      }
      .status{
        width:90%; height:80px; margin-left:25px;
      }
      .status_other{
        width:100%;
        padding: 10px;
      }
      body{
        background-color:  white;
      }
    </style>
    <script type="text/javascript">
    $('select.dropdown')
    .dropdown()
    ;
    </script>
  </head>
  <body>
    <div class="">
    </div>
    <div class="hleft">
      <div class="ui blue medium vertical inverted floating menu" style="height:555px;margin-top:0px; margin-left-0px;">
        <div class="item">
          <img src="/../KMS/Res/kost.png" alt="" />
        </div>
        <div class="item">
        <b>Notifikasi</b>
          <div class="menu">
            <a class="item" onclick="location.href='home.php?url=laporan_member';">Laporan Member</a>
            <a class="item" onclick="location.href='home.php?url=informasi_pembayaran';">Informasi Pembayaran/Tagihan</a>
          </div>
        </div>
        <?php
        if($level>1){
          echo "<a class=\"item\" href=\"home.php?url=pembayaran\">
            Pembayaran
          </a>";
        }
        ?>

        <?php if($level<2){
          echo "<div class=\"item\">
          <b>Member</b>
            <div class=\"menu\">
              <a class=\"item\" href=\"home.php?url=tambah_member\">Tambah Member Kost</a>
              <a class=\"item\" href=\"home.php?url=edit_member\">Edit/Hapus Member Kost</a>
              <a class=\"item\" href=\"home.php?url=edit_kost\">Tambah/Edit Informasi Kost</a>
              <a class=\"item\" href=\"home.php?url=tambah_tagihan\">Tambah Tagihan</a>
            </div>
          </div>
          <div class=\"item\">
          <b>Analisa Keuangan</b>
            <div class=\"menu\">
              <a class=\"item\" href=\"home.php?url=analisa_pemasukan\">Pemasukan</a>
            </div>
          </div>";
        } ?>
    </div>
    </div>
      <div class="hbody">
        <div class="ui blue inverted pointing menu">
          <a class="item" onclick="location.href='home.php?url=utama'">
            Home
          </a>
          <a class="item" onclick="location.href='home.php?url=profil';">
            Profil
          </a>
          <div class="right menu">
            <a class="item" onclick="location.href='logout.php';">
              Logout
            </a>
          </div>
        </div>
        <div class="ui segment">
          <p style="color:red;">
            Pengumuman dan notifikasi penting
          </p>
        </div>
          <!--
          //source code class model
          -->
        <?php
        if(isset($_GET['url'])){
        $url = "view/".$_GET['url'].".php";
        include "$url";
        }
         ?>
          <p></p>
      </div>

  </body>
</html>
