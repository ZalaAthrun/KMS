<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="ui segment">
      <div class="ui two column grid">
      <div class="row">
        <div class="column"> <h3>Tambah Member</h3>
          <p>
            <form class="" action="../KMS/view/exec_tambah_member.php" method="post">
            <table class="ui celled table">
            <tr>
              <td>
                Username :
              </td>
              <td>
                <input type="text" name="username" placeholder="Username">
              </td>
            </tr>
            <tr>
              <td>
                Nama :
              </td>
              <td>
                  <input type="text" name="nama" placeholder="nama">
              </td>
            </tr>
            <tr>
              <td>
                Password :
              </td>
              <td>
                  <input type="text" name="password" placeholder="">
              </td>
            </tr>
            <tr>
              <td>
                Jenis Identitas :
              </td>
              <td>
                  <input type="text" name="jenis_identitas" placeholder="KKTP/SIM">
              </td>
            </tr>
            <tr>
              <td>
                Nomor Identitas :
              </td>
              <td>
                  <input type="text" name="no_identitas" placeholder="">
              </td>
            </tr>
            <tr>
              <td>
                Pekerjaan :
              </td>
              <td>
                  <input type="text" name="pekerjaan" placeholder="">
              </td>
            </tr>
            <tr>
              <td>
                Alamat :
              </td>
              <td>
                  <input type="text" name="alamat" placeholder="">
              </td>
            </tr>
            <tr>
              <td>
                Nomor Telfon :
              </td>
              <td>
                  <input type="text" name="no_telfon" placeholder="">
              </td>
            </tr>
            </table>
                 <button class="ui blue button" type="submit" name="submit">Submit</button>
             </form>
          </p>
        </div>
        <div class="column"></div>
      </div>
    </div>
    </div>

  </body>
</html>
