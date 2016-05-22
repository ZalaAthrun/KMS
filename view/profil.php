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
            <img class="ui small circular image" src="/KMS/res/rizki.jpg">
        </div>
        <div class="column"> <h3>Profil Anda</h3>
          <p>
            <?php
            require_once("../KMS/src/user.php");
            @session_start();
            $user = $_SESSION['username'];
            $hasil = $user->read();
            echo "Nama : $hasil[nama]<br>
            Jenis/ID Pengenal : $hasil[jenis_pengenal]/$hasil[no_pengenal] <br>
            Pekerjaan : $hasil[pekerjaan] <br>
            Nomor Telefon : $hasil[no_telfon]<br>
            Alamat Asal : $hasil[alamat]<br>";
             ?>
          </p>s
        </div>
        <div class="column">
          <a href="home.php?url=edit_profil">Sunting</a>
        </div>
        <div class="column"></div>
      </div>
    </div>
    </div>

  </body>
</html>
