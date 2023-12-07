<?php
//Memanggil Class model database
include_once '../../config.php';
include_once '../../controllers/judultaController.php';
include_once '../../controllers/mahasiswaController.php';
include_once '../../controllers/dosenController.php';


//instansiasi class database
$database = new database;
$db = $database->getKoneksi();

$nim = $_GET['nim'];
$nip = $_GET['nip'];

$judultaControlle = new judultaController($db);
$result = $judultaControlle->updatestatus($nip, $nim, 'Diterima');

if($result){
    header("location:ta.php");
}
?>