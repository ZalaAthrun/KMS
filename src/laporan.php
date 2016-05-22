<?php

    class laporan{

      public function load_laporan($username){
        $conn = new mysqli('localhost','root','root','kms');
        $array = $conn->query("SELECT * FROM `laporan` WHERE id_laporan like '$username%'");
        if (!$array) {
          printf("Error: %s\n", mysqli_error($conn));
          exit();
        }
        while($hasil = $array->fetch_assoc()){
          echo"
            <tr>
              <td>$hasil[time]</td>
              <td>$hasil[id_user]</td>
              <td>$hasil[subjek]</td>
              <td>$hasil[keluhan]</td>
            </tr>
          ";
        }
      }
      public function insert_laporan($userid,$username,$subjek,$keluhan){
        $id_laporan = $userid.time();
        $conn = new mysqli('localhost','root','root','kms');
        $arr = $conn->query("INSERT into `laporan` Values ('$id_laporan','$username','$subjek','$keluhan',now())");
        if (!$arr) {
          printf("Error: %s\n", mysqli_error($conn));
          exit();
        }
      }

    }

 ?>
