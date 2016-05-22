<body>
  <div class="ui segment">
    <p>
      <h3>Tambah Laporan Baru</h3>
    </p>
    <div class="ui container">
              <div class="twelve wide column" style="">
                <form class="ui form" id="signup" action="/../KMS/view/exec_laporan.php" method="post">
                  <div class="row">
                    <div class="four fields">
                      <div class="field three wide column">
                        <input type="text" name="subjek" placeholder="Subjek ">
                      </div>
                      <div class="field eight wide column">
                        <input type="text" name="keluhan" placeholder="Keterangan">
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
              <h3>Laporan Permasalahan Kost</h3>
              <?php
               @session_start();
               require("/../../KMS/src/laporan.php");
               $user = $_SESSION['name'];
               $laporan = new laporan();
               echo"
               <table class=\"ui sortable celled table\">
               <thead>
                 <tr>
                 <th>Tanggal</th>
                 <th>Nama</th>
                 <th>Subjek</th>
                 <th>Keluhan</th>
               </tr></thead>
               <tbody>";
               $laporan->load_laporan($user);
               echo "</tbody>
             </table>";
             ?>
            </div>
    </body>
