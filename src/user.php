<?php
class user{
    public $nama;
    function __construct($username){
        $this->nama = $username;
    }
    public function create($username,$nama,$jenis_pengenal,$no_pengenal,$pekerjaan,$no_telfon,$foto,$password,$alamat){
      require("konfig.php");
      if(
      $conn->query("INSERT INTO `user`(`id_user`, `nama`, `jenis_pengenal`, `no_pengenal`, `pekerjaan`, `no_telfon`, `foto`, `password`, `alamat`,now())
      VALUES ('$username','$nama','$jenis_pengenal','$no_pengenal','$pekerjaan','$no_telfon',
      null,'$password','$alamat')")
      ){
        return true;
      }else{
        return false;
      }
    }


    public function read(){
      require("konfig.php");
      $array = $conn->query("SELECT * FROM `user` WHERE id_user='$this->nama'");
      if (!$array) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }
      $hasil = mysqli_fetch_array($array,MYSQLI_ASSOC);
      return $hasil;
    }

    public function read_table(){

      require("konfig.php");
      $array = $conn->query("SELECT * FROM `user` WHERE id_user like '$this->nama%' AND id_user!='$this->nama'");
      if (!$array) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }
      while($hasil = $array->fetch_assoc()){
        echo"
          <tr>
            <td>$hasil[id_user]</td>
            <td>$hasil[nama]</td>
            <td>$hasil[jenis_pengenal]"."$hasil[no_pengenal]</td>
            <td>$hasil[pekerjaan]</td>
            <td>$hasil[no_telfon]</td>
            <td>$hasil[password]</td>
            <td>$hasil[alamat]</td>
            <td>$hasil[tanggal]</td>
            <td><a href=\"/../KMS/home.php?url=edit_profil&penghuni=$hasil[id_user]\">Edit</a></td>
          </tr>
        ";
      }
    }

    public function read_table_select(){
      require("konfig.php");
      $array = $conn->query("SELECT username,nama FROM `user` WHERE id_user like '$this->nama%' AND id_user!='$this->nama'");
      if (!$array) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }
      while($hasil = $array->fetch_assoc()){
        echo"
          <option value=\"$hasil[username]\">$hasil[nama]</option>
        ";
      }
    }

    public function update($id_user,$nama,$pekerjaan,$no_telfon,$foto,$alamat){
      require("konfig.php");
      $array = $conn->query("UPDATE `user` SET nama='$nama',pekerjaan='$pekerjaan',no_telfon='$no_telfon',foto='$foto',alamat='$alamat' WHERE id_user='$id_user'");
    }
}


 ?>
