<?php
class maindb{
    public $nama;
    function __construct($username){
        $this->nama = $username;
    }
    public function create($id_kost,$username,$status,$id_kamar,$id_biaya_tambah){
      $conn = new mysqli('127.0.0.1','root','root','kms');
      if(
      $conn->query("INSERT INTO `main_db`(`id_kost`, `id_user`, `status`, `id_kamar`, `id_biaya_tambah`)
      VALUES ('$id_kost','$username',$status,'$id_kamar','$id_biaya_tambah')")
      ){
        return true;
      }else{
        return false;
      }
    }

    public function get_level($username){
      $conn = new mysqli("127.0.0.1",'root','root','kms');
      $hasil = $conn->query("SELECT status from `main_db` where id_user='$username'");
      $level = $hasil->fetch_assoc();
      return $level['status'];
    }
}

 ?>
