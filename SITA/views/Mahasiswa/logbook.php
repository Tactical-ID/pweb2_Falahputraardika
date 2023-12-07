<?php
session_start();
//Memanggil Class model database
include_once '../../config.php';
include_once '../../controllers/logbookController.php';
include_once '../../controllers/mahasiswaController.php';
require '../../navbar_mhs.php';


//instansiasi class database
$database = new database;
$db = $database->getKoneksi();


$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : null;

$mahasiswaController = new mahasiswaController($db);
$logbookController = new logbookController($db);
$logbook = $logbookController->getlogbookbynim($nim);
$nama = $mahasiswaController->getnamabynim($nim);
?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h3>Logbook Bimbingan</h3>
      <table class="table table-bordered">
        <thead>
          <tr class="table-secondary">
            <th scope="col">No</th>
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
  </div>
  </body>

  </html>