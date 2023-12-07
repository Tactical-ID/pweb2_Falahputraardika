<?php
session_start();
include_once '../../config.php';
include_once '../../controllers/judultaController.php';
include_once '../../controllers/dosenController.php';
include_once '../../controllers/mahasiswaController.php';
require '../../navbar_mhs.php';

$database = new database;
$db = $database->getKoneksi();

$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : null;

$judultaController = new judultaController($db);
$dosenController = new dosenController($db);
$mahasiswaController = new mahasiswaController($db);

$mahasiswa = $mahasiswaController->getdosbingbynim($nim);
$row = mysqli_fetch_assoc($mahasiswa);
$nip = $row['nip'];
$judulta = $judultaController->getjudultabynim($nim);
$dosen = $dosenController->getnamabynip($nip);
$nama = $mahasiswaController->getnamabynim($nim);
$statusjudul = $judultaController->getjudulbynipnim($nip, $nim);

?>
<div id="content" class="p-4 p-md-5 pt-5">
    <form action="proces_judul" method="post" class="border p-4 rounded" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="judulTA" class="form-label">Judul Tugas Akhir:</label>
            <input type="text" class="form-control border" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="dokumen" class="form-label">Dokumen Proposal:</label>
            <input type="file" class="form-control border" id="dokumen" name="dokumen" accept=".pdf">
        </div>

        <!-- Tambahkan input tambahan sesuai kebutuhan -->

        <div class="mb-3">
            <a href="ta.php" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">
                Simpan
            </button>
        </div>
    </form>
</div>