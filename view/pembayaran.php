<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
       $biaya->loadBelumBayar($user);
       echo "</tbody>
     </table>";
     echo "<h5>Total Tagihan = $biaya->total <h5>";
       ?>
    </div>

    <div class="ui segment">
      <h3>Metode Pembayaran</h3>
      <p>
        Transfer Tunai ke -> Rizki Maulana Akbar BRI : 145150200111083
        <i>Sistem akan otomatis mendeteksi pembayaran anda</i>
      </p>
      <p>
        Bayar ke Owner Kost <i>Dibutuhkan konfirmasi dari pihak owner untuk status pembayaran</i>
      </p>
      <p>
        Gunakan Kode Voucher <i> Dapat didapatkan di Indahmaret/Alfimaret terdekat </i> :
        <form class="" action="home.php?url=pembayaran" method="post">
          Kode Voucher : <input type="text" name="voucher" value="">
          <button type="submit" name="submit">Enter</button>
        </form>
      </p>
    </div>
  </body>
</html>

<?php
@session_start();
  require_once("/../../KMS/src/biaya.php");
  $user = $_SESSION['name'];
  $biaya = new biaya($user);
  if(isset($_REQUEST['submit'])){
    if($_REQUEST['voucher']=='voucher-kost'){
      $biaya->bayar();
    }else{
      echo "Kode Voucher Salah";
    }
  }
 ?>
