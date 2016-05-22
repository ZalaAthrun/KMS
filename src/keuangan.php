<?php
class keuangan{
  public $id_keuangan;
  public function __construct($username){
    $this->id_keuangan = $username;
  }

  public function load_by_id($username){

  }

  public function input($userid,$jenis,$jumlah,$keterangan){
    $conn = new mysqli('localhost','root','root','kms');
    $conn->query("INSERT INTO `KEUANGAN` VALUES(now(),'$userid','$jenis','$keterangan',$jumlah)");
    $conn->close();
  }

  public function getSaldo(){

  }


  public function loadEverything($username){
    $conn = new mysqli('localhost','root','root','kms');
    $array = $conn->query("SELECT * FROM `keuangan` WHERE id_kost = '$username'");
    if (!$array) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
    }
    while($hasil = $array->fetch_assoc()){
      echo"
        <tr>
          <td>$hasil[tanggal]</td>
          <td>$hasil[jenis]</td>
          <td>$hasil[jumlah]</td>
          <td>$hasil[keterangan]</td>
        </tr>
      ";
    }

    $pemasukan = $conn->query("SELECT SUM(jumlah) as jum FROM `keuangan` WHERE id_kost = '$username' and
    jenis = 'pemasukan'");
    $pengeluaran= $conn->query("SELECT SUM(jumlah) as jum FROM `keuangan` WHERE id_kost = '$username' and
    jenis = 'pengeluaran'");
    $masuk = $pemasukan->fetch_assoc();
    $keluar = $pengeluaran->fetch_assoc();
    $total = $masuk['jum']-$keluar['jum'];
    echo "Saldo Keseluruhan = $total";
  }


}

 ?>
