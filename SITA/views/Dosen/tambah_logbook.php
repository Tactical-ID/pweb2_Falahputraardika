<?php
session_start();
//Memanggil Class model database
include_once '../../config.php';
include_once '../../controllers/logbookController.php';
include_once '../../controllers/mahasiswaController.php';
include_once '../../controllers/dosenController.php';
require '../../navbar_dsn.php';


//instansiasi class database
$database = new database;
$db = $database->getKoneksi();


$nip = isset($_SESSION['nip']) ? $_SESSION['nip'] : null;

$dosenController = new dosenController($db);
$logbookController = new logbookController($db);
$logbook = $logbookController->getlogbookbynip($nip);
$mahasiswaArray = $logbookController->inputmhslogbook($nip);
$namadsn = $dosenController->getnamabynip($nip);
?>
        <div id="content" class="p-4 p-md-5 pt-5">
            <form action="proces_logbook" method="post" class="border p-4 rounded">
                <div class="mb-3">
                    <label for="nim" class="form-label">Pilih Mahasiswa:</label>
                    <select name="nim" id="nim" class="form-select">
                        <option value="">Pilih mahasiswa</option>
                        <?php foreach ($mahasiswaArray as $mahasiswa) { ?>
                            <option value="<?php echo $mahasiswa['nim']; ?>"><?php echo $mahasiswa['nama_mhs']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tgl" class="form-label">Input tanggal bimbingan:</label>
                    <input type="date" class="form-control border" id="tgl" name="tgl">
                </div>
                <div class="mb-3">
                    <label for="topik" class="form-label">Topik:</label>
                    <input type="text" class="form-control border" id="topik" name="topik" style="border-color: #000; background-color: #fff;">
                </div>
                <div class="mb-3">
                    <label for="revisi" class="form-label">Revisi:</label>
                    <input type="text" class="form-control border" id="revisi" name="revisi">
                </div>
                <!-- Tambahkan input tambahan sesuai kebutuhan -->

                <div class="mb-3">
                    <a href="logbook.php" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary" >
                        Simpan
                    </button>
                </div>
            </form>
        </div>