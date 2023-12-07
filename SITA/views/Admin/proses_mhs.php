<?php
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';

$database = new database();
$db = $database->getKoneksi();

 //if(isset($_POST['submit'])){

    $nim = $_POST['nim'];
    $nama_mhs = $_POST['nama_mhs'];
    $prodi_mhs = $_POST['prodi_mhs'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $kontak = $_POST['kontak'];

    $mahasiswaController = new mahasiswaController($db);
    $result = $mahasiswaController->inputMahasiswa($nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,'2023-2026');

    if($result){
         header("location:mhs?status=tambah");
    }else{
         header("location:tambah_mhs");
    }
//}
?>