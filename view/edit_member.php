<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ui segment">
      <h3>Daftar Member Kost</h3>
      <?php
      require_once("/../../KMS/src/user.php");
        @session_start();
        $user = $_SESSION['username'];
        $username = $user->read();

       echo"
       <table class=\"ui sortable celled table\">
       <thead>
         <tr>
         <th>ID User</th>
         <th>Nama</th>
         <th>Pengenal</th>
         <th>Pekerjaan</th>
         <th>Nomor Telefon</th>
         <th>Password</th>
         <th>Alamat</th>
         <th>Tanggal Masuk</th>
         <th>Edit</th>
       </tr></thead>
       <tbody>";
              echo $user->read_table();
              echo"
       </tbody>
     </table>

       ";


       ?>

    </div>

  </body>
</html>
