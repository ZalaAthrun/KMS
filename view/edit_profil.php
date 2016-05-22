<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ui segment">
      <div class="ui three column grid">
      <div class="row">
        <div class="column">
            <img class="ui small circular image" src="">
        </div>
        <div class="column"> <h3>Edit Profil Anda</h3>
          <form class="" action="../KMS/view/exec_edit_profil.php" method="post">
            <table class="ui celled table">
              <?php
              require_once("../KMS/src/user.php");
              if(!isset($_REQUEST['penghuni'])){
              @session_start();
              $user = $_SESSION['username'];
              $hasil = $user->read();
              }else{
              $user = new user($_REQUEST['penghuni']);
              $hasil = $user->read();
              }
              echo "<tr><td>ID</td><td><input name=\"id_user\" type=\"text\"
               value=\" $hasil[id_user]\"readonly/></td></tr>";
              echo "<tr><td>Nama</td><td><input name=\"nama\" type=\"text\"
               value=\" $hasil[nama]\"/></td></tr>";
              echo "<tr><td>ID/No Pengenal</td><td><input name=\"nama\" type=\"text\"
                value=\"$hasil[jenis_pengenal]/$hasil[no_pengenal]\"/></td></tr>";
              echo "<tr><td>Pekerjaan</td><td><input name=\"pekerjaan\" type=\"text\"
              value=\" $hasil[pekerjaan]\"/></td></tr>";
              echo "<tr><td>Nomor Telefon</td><td><input name=\"no_telfon\" type=\"text\"
                value=\" $hasil[no_telfon]\"/></td></tr>";
              echo "<tr><td>Alamat</td><td><input name=\"alamat\" type=\"text\"
                value=\" $hasil[alamat]\"/></td></tr>";
              echo "<tr><td>Foto</td><td><input name=\"foto\" type=\"text\"
                  value=\"\"readonly></td></tr>";
               ?>
            </table>
              <button class="ui blue button" type="submit" name="submit">Submit</button>
          </form>
          <p>
          </p>
        </div>
        <div class="column"></div>
      </div>
    </div>
    </div>
  </body>
</html>
