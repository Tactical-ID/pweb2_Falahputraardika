<?php

include_once '../../config.php';
include_once '../../controllers/dosenController.php';

$database = new Database;
$db = $database->getKoneksi();


if (isset($_GET['nip'])) {
    $nip= $_GET['nip'];
   
    $dosenController = new dosenController($db);
    $result = $dosenController->deleteDosen($nip);

    if ($result) {
        header("location:dsn?status=hapus");
    } else {
        header("location:dsn");
    }
}
?>