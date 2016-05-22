<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ui segment">
      <h3>Tambah Tagihan Baru</h3>
      <form class="" action="/../KMS/home.php?url=tambah_tagihan" method="post">
        <p>
            ID User       <input type="text" name="id" value="">
        </p>
        <p>
            Keterangan       <input type="text" name="keterangan" value="">
        </p>
        <p>
            Jumlah       <input type="text" name="jumlah" value="">
        </p>
        <input type="submit" name="submit" value="Submit">
      </form>
    </div>
    <div class="ui segment">
      <?php
       @session_start();
       require_once("/../../KMS/src/biaya.php");
       $user = $_SESSION['name'];
       $biaya = new biaya($user);
       echo"
       <table class=\"ui sortable celled table\">
       <thead>
         <tr>
         <th>UserID</th>
         <th>Keterangan</th>
         <th>Nominal</th>
         <th>Tanggal</th>
         <th>Status Pembayaran</th>
       </tr></thead>
       <tbody>";
       $biaya->loadEverything($user);
       echo "</tbody>
     </table>";
       ?>
    </div>
  </body>
</html>

<?php
if(isset($_REQUEST['submit'])){
  @session_start();
  require_once("/../../KMS/src/biaya.php");
  $user = $_SESSION['name'];
  $biaya = new biaya($user);
  $biaya->add($_REQUEST['id'],$_REQUEST['keterangan'],$_REQUEST['jumlah']);
} ?>
