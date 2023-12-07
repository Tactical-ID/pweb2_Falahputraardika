     <?php
     session_start();
     include_once '../../config.php';
     include_once '../../controllers/logbookController.php';

     $database = new database();
     $db = $database->getKoneksi();

     // if(isset($_POST['submit'])){
     $nip = isset($_SESSION['nip']) ? $_SESSION['nip'] : null;
     $nim = $_POST['nim'];
     $tgl = $_POST['tgl'];
     $topik = $_POST['topik'];
     $revisi = $_POST['revisi'];

     $logbookController = new logbookController($db);
     $result = $logbookController->inputLogbook($nip,$nim,$tgl,$topik,$revisi);

     if($result){
          header("location:logbook?status=tambah");
     }else{
          header("location:logbook");
     }
     // }
     ?>