<?php
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';

$database = new database();
$db = $database->getKoneksi();

$mahasiswaController = new mahasiswaController($db);

// if(isset($_POST['submit'])){
$nim = $_POST['nim'];
$newnim = $_POST['newnim'];
$nama_mhs = $_POST['nama_mhs'];
$prodi_mhs = $_POST['prodi_mhs'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$kontak = $_POST['kontak'];
// $angkatan = $_POST['angkatan'];

$mahasiswaController = new mahasiswaController($db);
$result = $mahasiswaController->updateMahasiswa($newnim,$nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,'2024-2027');

if ($result) {
    header("location:mhs?status=edit");
} else {
    header("location:edit_mhs");
}
// }
