<?php
error_reporting(E_ERROR | E_PARSE);

//Memanggil Class model database
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';
include_once '../../controllers/dosenController.php';
include_once '../../controllers/logbookController.php';
require '../../navbar_adm.php';

//instansiasi class database
$database = new database;
$db = $database->getKoneksi();

$prodi_mhs = $_GET['id'];
$mahasiswaController = new MahasiswaController($db);
$dosenController = new dosenController($db);
$logbookController = new logbookController($db);
$mahasiswa = $mahasiswaController->getmhsbyjurusan($prodi_mhs);
$dosen = mysqli_fetch_assoc($mahasiswa);
$nip = $dosen['nip'];
$pembimbing = $dosenController->getnamabynip($nip);
?>

<div id="content" class="p-4 p-md-5 pt-5">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">

            <h3>Data Bimbingan <?php echo $prodi_mhs ?></h3>


            <table class="table table-bordered" id="sortTable">
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th>Nama</th>
                        <th>Jurusan</th>
                        <!-- <th>Tanggal Lahir</th> -->
                        <th>Pembimbing</th>
                        <th>Logbook Bimbingan</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($mahasiswa as $x) {
                ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $x['nim'] ?></td>
                        <td><?php echo $x['nama_mhs'] ?></td>
                        <td><?php echo $x['prodi_mhs'] ?></td>
                        <td><?php $row = mysqli_fetch_assoc($pembimbing);
                            echo $row['nama_dosen'] ?></td>
                        <td> <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $x['nim'] ?>">
                                Lihat
                                </button></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal<?php echo $x['nim'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            $nim = $x['nim'];
                            $logbook = $logbookController->getlogbookbynim($nim);
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
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    </head>

    <div class="container" style="width:40%" ;>

        <table class="table table-striped table-bordered" id="sortTable">

        </table>
    </div>
    <script>
        $('#sortTable').DataTable();
    </script>

    </body>

    </html>