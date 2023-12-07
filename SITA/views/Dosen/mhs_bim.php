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

$mahasiswaController = new mahasiswaController($db);
$dosenController = new dosenController($db);
$logbookController = new logbookController($db);
$logbook = $logbookController->getlogbookbynip($nip);
$mahasiswaArray = $logbookController->inputmhslogbook($nip);
$namadsn = $dosenController->getnamabynip($nip);
$mahasiswa = $mahasiswaController->getmhsbynip($nip);
?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
    <h3>Daftar Mahasiswa Bimbingan</h3>
    <table class="table table-bordered">
      <thead>
        <tr class="table-secondary">
          <th scope="col">No</th>
          <th scope="col">NIM</th>
          <th scope="col">Nama</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Kontak</th>
        </tr>
      </thead>
      <tbody>
        </tr>
        <?php
        $no = 1;
        foreach ($mahasiswa as $x) {
        ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $x['nim'] ?></td>
            <td><?php echo $x['nama_mhs'] ?></td>
            <td><?php echo $x['prodi_mhs'] ?></td>
            <td><?php echo $x['kontak'] ?></td>
          </tr>
        <?php
        }
        ?>
        <!-- Tambahkan baris lain sesuai dengan data yang dimiliki -->
      </tbody>
    </table>
  </div>
  </body>

  </html>