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
          <label for="">Foto Kost</label>
            <img class="ui small circular image" src="/images/wireframe/square-image.png">
        </div>
        <div class="column"> <h3>Tambah/Edit Informasi Kost</h3>
          <p>
            <?php
                require_once("../KMS/src/user.php");
                require("../KMS/src/kost.php");
                @session_start();
                $user = $_SESSION['username'];
                $username = $user->read();
                $kost = new kost('$username[id_user]');
                if($kost->kost_is_available()){
                  echo "edit";
                }else{
             ?>
             <form class="" action="../KMS/view/exec_edit_kost.php?edit=false" method="post">
               <table class="ui celled table">
                 <tr>
                   <td>
                     Nama Kost :
                   </td>
                   <td>
                     <input type="text" name="nama" placeholder="">
                   </td>
                 </tr>
                 <tr>
                    <td>
                      Alamat :
                    </td>
                    <td>
                      <input type="text" name="alamat" placeholder="Jalan Nomor dan Kota">
                    </td>
                 </tr>
                 <tr>
                   <td>
                     Deskripsi :
                   </td>
                   <td>
                     <input type="text" name="deskripsi" placeholder="">
                   </td>
                 </tr>
               </table>
               <button class="ui blue button" type="submit" name="submit">Submit</button>
             </form>
             <?php } ?>
          </p>
        </div>
        <div class="column"></div>
      </div>
    </div>
    </div>

  </body>
</html>
