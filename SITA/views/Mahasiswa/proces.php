<?php
session_start();
include_once '../../config.php';
include_once '../../controllers/judultaController.php';
include_once '../../controllers/dosenController.php';
include_once '../../controllers/mahasiswaController.php';

$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : null;
$database = new database();
$db = $database->getKoneksi();

$dosenControlller = new dosenController($db);
$mahasiswaController = new mahasiswaController($db);
$mahasiswa = $mahasiswaController->getdosbingbynim($nim);
$row = mysqli_fetch_assoc($mahasiswa);
$nip = $row['nip'];
//if(isset($_POST['submit'])){
    $judul = $_POST['judul'];
    // Mendapatkan informasi file
    $file_name = $_FILES['dokumen']['name'];
    $file_tmp = $_FILES['dokumen']['tmp_name'];
    $file_destination = "../../assets/doc" . $file_name;

    // Pindahkan file ke lokasi tujuan
    move_uploaded_file($file_tmp, $file_destination);


    $judultaController = new judultaController($db);
    $result = $judultaController->inputJudul($nim,$nip,$judul,$file_name);

    if($result){
        header("location: proposal");
    } else {
        header("location:tambah_judul");
    }
//}
?>
