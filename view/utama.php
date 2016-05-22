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
        <img class="ui small circular image" src="/KMS/res/kost.jpg">
        </div>
        <div class="column"> <h3>Informasi Status</h3>
          <p>
            <?php
            require_once("/../KMS/src/user.php");
            require("/../KMS/src/kost.php");
            require("/../KMS/src/biaya.php");
            @session_start();
            $user = $_SESSION['username'];
            $username = $user->read();
            $kost = new kost($username['id_user']);
            $nama = $kost->cek_posisi();
            $biaya = new biaya($username['id_user']);
            $tagihan = $biaya->getTagihan($username['id_user']);
            $maindb = new maindb($username['id_user']);
            $level = $maindb->get_level($username['id_user']);
            if($level>=2){
              echo "<h3>Selamat Datang, $username[nama]</h3><br>";
              echo "Alamat Kost : $nama <br>
              Tagihan Bulan Ini : Rp $tagihan <br>";
            }else{
              echo "<h3>Selamat Datang, $username[nama]</h3><br>";
              echo "Kost Management System akan membantu mengatur administrasi dan pembayaran bisnis kost anda<br>
              Semoga Bermanfaat<br>";
            }

             ?>
          </p>
        </div>
        <div class="column"></div>
      </div>
    </div>
    </div>

  </body>
</html>
