<?php
session_start();
include_once '../../config.php';
include_once '../../controllers/mahasiswaController.php';
include_once '../../controllers/dosenController.php';
require_once '../../navbar_mhs.php';

$database = new database;
$db = $database->getKoneksi();

$nim = isset($_SESSION['nim']) ? $_SESSION['nim'] : null;

$mahasiswaController = new mahasiswaController($db);
$dosenController = new dosenController($db);
$nama = $mahasiswaController->getnamabynim($nim);
$mahasiswa = $mahasiswaController->getAllmahasiswa();
$rowmhs = mysqli_num_rows($mahasiswa);

$dosen = $dosenController->getAlldosen();
$jmlhdosen = mysqli_num_rows($dosen);
$jurusan = $mahasiswaController->getjurusan();

?>
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-md-3">
            <div class="card-box bg-blue">
              <div class="inner">
                <h3><?php echo $rowmhs; ?> </h3>
                <p> Jumlah Mahasiswa </p>
              </div>
              <div class="icon">
                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
              </div>
              <a href="#" class="card-box-footer"> <i class="fa "></i></a>

            </div>
          </div>

          <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
              <div class="inner">
                <h3> <?php echo $jmlhdosen; ?> </h3>
                <p> Jumlah Dosen</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="#" class="card-box-footer"> <i class="fa "></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
              <div class="inner">
                <h3> <?php echo count($jurusan); ?></h3>
                <p> Jumlah Jurusan </p>
              </div>
              <div class="icon">
                <i class="fa fa-book" aria-hidden="true"></i>
              </div>
              <a href="#" class="card-box-footer"> <i class="fa "></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
              <div class="inner">
                <h3> 1 </h3>
                <p> Jumlah Petugas </p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="card-box-footer"> <i class="fa "></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="card recent-sales overflow-auto">
        <div class="card-body">
          <div style="padding: 70px;">
            <h3>"Selamat Datang Di Dashboard Mahasiswa"</h3>

            <style>
              .card-box {
                position: relative;
                color: #fff;
                padding: 20px 10px 40px;
                margin: 20px 0px;
              }

              .card-box:hover {
                text-decoration: none;
                color: #f1f1f1;
              }

              .card-box:hover .icon i {
                font-size: 100px;
                transition: 1s;
                -webkit-transition: 1s;
              }

              .card-box .inner {
                padding: 5px 10px 0 10px;
              }

              .card-box h3 {
                font-size: 27px;
                font-weight: bold;
                margin: 0 0 8px 0;
                white-space: nowrap;
                padding: 0;
                text-align: left;
              }

              .card-box p {
                font-size: 15px;
              }

              .card-box .icon {
                position: absolute;
                top: auto;
                bottom: 5px;
                right: 5px;
                z-index: 0;
                font-size: 72px;
                color: rgba(0, 0, 0, 0.15);
              }

              .card-box .card-box-footer {
                position: absolute;
                left: 0px;
                bottom: 0px;
                text-align: center;
                padding: 3px 0;
                color: rgba(255, 255, 255, 0.8);
                background: rgba(0, 0, 0, 0.1);
                width: 100%;
                text-decoration: none;
              }

              .card-box:hover .card-box-footer {
                background: rgba(0, 0, 0, 0.3);
              }

              .bg-blue {
                background-color: #00c0ef !important;
              }

              .bg-green {
                background-color: #00a65a !important;
              }

              .bg-orange {
                background-color: #f39c12 !important;
              }

              .bg-red {
                background-color: #d9534f !important;
              }
            </style>

          </div>


          </body>

          </html>