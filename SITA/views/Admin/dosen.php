<?php
//Memanggil Class model database
include_once '../../config.php';
include_once '../../controllers/MahasiswaController.php';
include_once '../../controllers/dosenController.php';
require '../../navbar_adm.php';

//instansiasi class database
$database = new database;
$db = $database->getKoneksi();

$dosenController = new dosenController($db);
$dosen = $dosenController->getAlldosen();
?>
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
          <h3>Data Dosen</h3>
          <a href="tambah_dsn" class="btn btn-primary mb-3">Tambah Data Dosen</a>

          <?php
          if (isset($_GET['status']) && $_GET['status'] == "tambah") {
            // Tampilkan alert jika status adalah "success"
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data mahasiswa berhasil ditambahkan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href=\'dsn\'"></button>
                      </div>';
          } elseif (isset($_GET['status']) && $_GET['status'] == "edit") {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data berhasil diubah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href=\'dsn\'"></button>
                        </div>';
          } elseif (isset($_GET['status']) && $_GET['status'] == "hapus") {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Data telah dihapus!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href=\'dsn\'"></button>
                        </div>';
          }
          ?>

          <table class="table table-bordered" id="sortTable">
            <thead>
              <tr class="table-secondary">
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Kontak</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($dosen as $x) {
            ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $x['nip'] ?></td>
                <td><?php echo $x['nama_dosen'] ?></td>
                <td><?php echo $x['jurusan'] ?></td>
                <td><?php echo $x['alamat'] ?></td>
                <td><?php echo $x['kontak'] ?></td>
                <td>
                  <a href="edit_dsn?nip=<?php echo $x['nip']; ?>" class="btn btn-warning">Edit </a>
                  <a href="hapus_dsn?nip=<?php echo $x['nip']; ?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus....?')">Hapus</a>
                </td>
              </tr>
            <?php
            }
            ?>

          </table>
        </div>
      </div>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

      <body>
        <div class="container" style="width:40%" ;>

          <table class="table table-striped table-bordered" id="sortTable">

          </table>
        </div>
        <script>
          $('#sortTable').DataTable();
        </script>
      </body>

</body>

</html>