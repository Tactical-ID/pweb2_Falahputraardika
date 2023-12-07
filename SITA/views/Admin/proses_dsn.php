<?php
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';
include_once '../../controllers/dosenController.php';

$database = new database();
$db = $database->getKoneksi();

 //if(isset($_POST['submit'])){

    $nip = $_POST['nip'];
    $nama_dosen = $_POST['nama_dosen'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];

    $dosenController = new dosenController($db);
    $result = $dosenController->inputDosen($nip,$nama_dosen,$jurusan,$alamat,$kontak);

    if($result){
         header("location:dsn?status=tambah");
    }else{
         header("location:tambah_dsn");
    }
//}
?>