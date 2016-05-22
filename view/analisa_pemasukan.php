 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="ui segment">
       <p>
         <h3>Tambah Pemasukan/Pengeluaran baru</h3>
       </p>
       <div class="ui container">
                 <div class="twelve wide column" style="">
                   <form class="ui form" id="signup" action="/../KMS/view/exec_keuangan.php" method="post">
                     <div class="row">
                       <div class="four fields">
                         <div class="ui form">
                           <div class="field">
                             <select class="ui dropdown" name="jenis">
                               <option value="pemasukan">Pemasukan</option>
                               <option value="pengeluaran">Pengeluaran</option>
                             </select>
                           </div>
                         </div>
                         <div class="field three wide column">
                           <input type="text" name="jumlah" placeholder="Jumlah ">
                         </div>
                         <div class="field three wide column">
                           <input type="text" name="ket" placeholder="Keterangan">
                         </div>
                         <div class="">
                             <button class="ui blue button" type="submit" name="submit">Submit</button>
                         </div>
                       </div>
                     </div>
                     <div class="row">
                     </div>
                   </form>
                   </div>
                 </div>
                </div>
                 <div class="ui segment">
                 <h3>Rekapitulasi Keuangan Kost</h3>
                 <?php
                  @session_start();
                  require("/../../KMS/src/keuangan.php");
                  $user = $_SESSION['name'];
                  $keuangan = new keuangan($user);
                  echo"
                  <table class=\"ui sortable celled table\">
                  <thead>
                    <tr>
                    <th>Tanggal</th>
                    <th>Jenis Transaksi</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                  </tr></thead>
                  <tbody>";
                  $keuangan->loadEverything($user);
                  echo "</tbody>
                </table>";
              ?>



     </div>

       </body>
    </html>
