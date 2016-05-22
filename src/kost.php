<?php

class kost{
    public $id_kost;
    function __construct($id_kost){
        $this->id_kost = $id_kost;
    }
    public function create($id,$nama,$alamat,$deskripsi){
      $conn = new mysqli('127.0.0.1','root','root','kms');
      if(
      $conn->query("INSERT INTO `kost`(`id_kost`, `nama`, `alamat`, `deskripsi`)
      VALUES ('$id','$nama','$alamat','$deskripsi')")
      ){
        return true;
      }else{
        return false;
      }
    }

    public function update($username,$nama,$alamat,$deskripsi){
      $conn = new mysqli('127.0.0.1','root','root','kms');
      $conn->query("UPDATE `kost` SET `nama`='$nama',`alamat`=$alamat,
        `deskripsi`='$deskripsi' WHERE id_kost='$username'");
    }

    public function kost_is_available(){
        $conn = new mysqli('127.0.0.1','root','root','kms');
        if($conn->query("SELECT ISNULL(SELECT * from `kost` where id_kost='$this->id_kost'),0")!=null){
          return true;
        }else{
          return false;
        }
    }

    public function cek_posisi(){
      $conn = new mysqli('127.0.0.1','root','root','kms');
      $array = $conn->query("SELECT * from `kost` where id_kost=(SELECT id_kost from `main_db`
        where id_user='$this->id_kost')");
      if (!$array) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }
      $hasil = mysqli_fetch_array($array,MYSQLI_ASSOC);
      return $hasil['alamat'];
    }

    public function get_admin(){
      $conn = new mysqli('127.0.0.1','root','root','kms');
      $array = $conn->query("SELECT * from `kost` where id_kost=(SELECT id_kost from `main_db`
        where id_user='$this->id_kost')");
      if (!$array) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }
      $hasil = mysqli_fetch_array($array,MYSQLI_ASSOC);
      return $hasil['id_kost'];
    }
  }


 ?>
