<?php
include_once '../../config.php';
include_once '../../controllers/dosenController.php';

$database = new database();
$db = $database->getKoneksi();

$dosenController = new dosenController($db);

// if(isset($_POST['submit'])){
$nip = $_POST['nip'];
$newnip = $_POST['newnip'];
$nama_dosen = $_POST['nama_dosen'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
// $angkatan = $_POST['angkatan'];

$dosenController = new dosenController($db);
$result = $dosenController->updateDosen($newnip,$nip,$nama_dosen,$jurusan,$alamat,$kontak);

if ($result) {
    header("location:dsn?status=edit");
} else {
    header("location:tambah_dsn");
}
// }
