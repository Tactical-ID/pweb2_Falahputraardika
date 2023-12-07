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
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
<div class="card recent-sales overflow-auto">
        <div class="card-body">
  <h3>Logbook Bimbingan</h3>
  <a href="tambah_logbook" type="buton" class="btn btn-primary mb-3">Input Logbook Bimbingan</a>
  <table class="table table-bordered">
    <thead>
      <tr class="table-secondary">
        <th scope="col">No</th>
        <th scope="col">Nama Mahasiswa</th>
        <th scope="col">Tanggal bimbingan</th>
        <th scope="col">Topik</th>
        <th scope="col">Revisi</th>
      </tr>
    </thead>
    <tbody>
      </tr>
      <?php
      $no = 1;
      foreach ($logbook as $x) {
      ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td> <?php foreach ($mahasiswaArray as $mahasiswa) { ?>
              <?php if ($mahasiswa['nim'] == $x['nim']) {
                    echo $mahasiswa['nama_mhs'];
                  } ?>
            <?php } ?></td>
          <td><?php echo $x['tgl'] ?></td>
          <td><?php echo $x['topik'] ?></td>
          <td><?php echo $x['revisi'] ?></td>
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