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
       $biaya->loadEverything($user);
       echo "</tbody>
     </table>";
       ?>
    </div>
  </body>
</html>
