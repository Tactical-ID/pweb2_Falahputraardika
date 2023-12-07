<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

//Memanggil Class model database
include_once '../../config.php';
include_once '../../controllers/judultaController.php';
include_once '../../controllers/mahasiswaController.php';
include_once '../../controllers/dosenController.php';
require '../../navbar_dsn.php';

//instansiasi class database
$database = new database;
$db = $database->getKoneksi();

$nip = $_SESSION['nip'];

$dosenController = new dosenController($db);
$judultaController = new judultaController($db);
$mahasiswaController = new mahasiswaController($db);

$judulta = $judultaController->getjudultabynip($nip);
$namadsn = $dosenController->getnamabynip($nip);
$jdta = $judultaController->getjudultabynip($nip);
$nim = $judul['nim'];

$statusjudul = $judultaController->getjudulbynipnim($nip, $nim);
?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h3>Judul Proposal Mahasiswa</h3>

      <table class="table table-bordered">
        <thead>
          <tr class="table-secondary">
            <th scope="col">No</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Judul Proposal</th>
            <th scope="col">Status</th>
            <th scope="col">Dokumen Proposal</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $no = 1;
          foreach ($jdta as $x) {
            $namaMahasiswa = $mahasiswaController->getmhsbynip($x['nip']);
            foreach ($namaMahasiswa as $d) {
          ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $d['nama_mhs']; ?></td>
                <td>
                  <?php
                  echo $x['judul'];
                  ?>
                </td>
                <td>

                </td>
                <td>

                </td>

                <td>
                  <?php
                  // Tampilkan judul_ta atau tombol untuk menginput judul
                  if (!empty($x['judul'])) {
                    // Jika judul sudah diinput, tampilkan judul
                    echo '<button type="button" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Revisi
                        </button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#terima">
                            Terima
                        </button>';
                  }
                  ?>
                </td>
              <?php } ?>

            <?php } ?>
              </tr>
        </tbody>
      </table>
      <!-- Modal -->
      <div class="modal fade" id="terima" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-body">
              <form action="proces.php" method="post">
                <div class="mb-3">
                  <hr class="bordered">
                  <p>
                  <h6>Apakah Anda yakin ingin Menerima Judul ini?</h6>
                  </p>
                </div>
                <!-- Tambahkan input tambahan sesuai kebutuhan -->
                <a href="#" class="btn btn-secondary">Kembali</a>
                <a href="terima.php?nip=<?php echo $nip; ?>&nim=<?php echo $nim; ?>" class="btn btn-primary">Terima</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>