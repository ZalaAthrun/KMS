<?php
    class biaya {
      public $user;
      public $total;
      public function __construct($user){
        $this->user = $user;
      }

      public function add($id,$keterangan,$jumlah){
        $conn = new mysqli('localhost','root','root','kms');
        $username = $this->user."_".$id;
        $conn->query("INSERT INTO `biaya_tambah` VALUES('$username','$keterangan',$jumlah,0,now())");
        $conn->close();
      }

      public function getTagihan($userid){
        $conn = new mysqli('localhost','root','root','kms');
        $tag = $conn->query("SELECT SUM(harga) as tagihan from `biaya_tambah` where
        id_biaya_tambah like '$userid%' And  status=0");
        if (!$tag) {
          printf("Error: %s\n", mysqli_error($conn));
          exit();
        }
        $tagihan =$tag->fetch_assoc();
        return $tagihan['tagihan'];
      }

      public function bayar(){
        require_once("/../../KMS/src/keuangan.php");
        require("/../KMS/src/kost.php");
        $conn = new mysqli('localhost','root','root','kms');
        $kost = new kost($this->user);
        $nama = $kost->get_admin();
        $keuangan = new keuangan($nama);
        $array1 = $conn->query("SELECT * FROM `biaya_tambah` WHERE id_biaya_tambah like '$this->user%' AND status=0");
        $array2 = $conn->query("UPDATE `biaya_tambah` SET `status`=1 WHERE id_biaya_tambah='$this->user'");
        while($hasil = $array1->fetch_assoc()){
          $this->total+=$hasil['harga'];
        }
        $jenis = 'Pemasukan';
        $jumlah = $this->total;
        $keterangan = 'Pembayaran Tagihan '.$this->user.'  ';
        $keuangan->input($nama,$jenis,$jumlah,$keterangan);

      }

      public function loadBelumBayar($username){
        $conn = new mysqli('localhost','root','root','kms');
        $array = $conn->query("SELECT * FROM `biaya_tambah` WHERE id_biaya_tambah like '$username%' AND status=0");
        if (!$array) {
          printf("Error: %s\n", mysqli_error($conn));
          exit();
        }
        $status = '';
        while($hasil = $array->fetch_assoc()){
          if($hasil['status']==1){
            $status = 'lunas';
          }else{
            $status = 'belum lunas';
          }
          $this->total+=$hasil['harga'];
          echo"
            <tr>
              <td>$hasil[id_biaya_tambah]</td>
              <td>$hasil[nama_kebutuhan]</td>
              <td>$hasil[harga]</td>
              <td>$hasil[tanggal]</td>
              <td>$status</td>
            </tr>
          ";

        }
      }

      public function loadEverything($username){
        $conn = new mysqli('localhost','root','root','kms');
        $array = $conn->query("SELECT * FROM `biaya_tambah` WHERE id_biaya_tambah like '$username%'");
        if (!$array) {
          printf("Error: %s\n", mysqli_error($conn));
          exit();
        }
        $status = '';
        while($hasil = $array->fetch_assoc()){
          if($hasil['status']==1){
            $status = 'lunas';
          }else{
            $status = 'belum lunas';
          }
          $this->total+=$hasil['harga'];
          echo"
            <tr>
              <td>$hasil[id_biaya_tambah]</td>
              <td>$hasil[nama_kebutuhan]</td>
              <td>$hasil[harga]</td>
              <td>$hasil[tanggal]</td>
              <td>$status</td>
            </tr>
          ";

        }
      }

    }


 ?>
