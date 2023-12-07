<?php
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';
require '../../navbar_adm.php';

$database = new database;
$db = $database->getKoneksi();

$mahasiswaController = new mahasiswaController($db);
$jurusan = $mahasiswaController->getjurusan();
?>
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">

          <h3>Data Bimbingan Mahasiswa</h3>
          <table class="table table-bordered">
            <thead>
              <tr class="table-secondary">
                <th scope="col">No</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Data</th>
              </tr>
            </thead>
            <tbody>
              </tr>
              <?php
              $no = 1;
              foreach ($jurusan as $x) {
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $x['nama_jurusan'] ?></td>
                  <td><a href="bimjur?id=<?php echo $x['nama_jurusan'] ?>" class="btn btn-primary">Lihat Data</a></td>
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