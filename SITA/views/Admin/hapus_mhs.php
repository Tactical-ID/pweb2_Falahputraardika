<?php

include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';

$database = new Database;
$db = $database->getKoneksi();


if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
   
    $mahasiswaController = new mahasiswaController($db);
    $result = $mahasiswaController->deleteMahasiswa($nim);

    if ($result) {
        header("location:mhs?status=hapus");
    } else {
        header("location:mhs");
    }
}
?>