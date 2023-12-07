<?php
include_once 'config.php';

session_start();
$database = new database();

$db = $database->getKoneksi();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nama'];
    $password = $_POST['katakunci'];

    $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) === 1) {
            if ($row['role'] == '1') {
                $_SESSION['username'] = $username;
                $nim = $row['nim'];
                $_SESSION['nim'] = $nim;
                $nip = $row['nip'];
                $_SESSION['nip'] = $nip;
                header("Location: mahasiswa");
                exit();
            } else if ($row['role'] == '2') {
                $_SESSION['username'] = $username;
                $nip = $row['nip'];
                $_SESSION['nip'] = $nip;
                header("Location: dosen");
                exit();
            }else if ($row['role'] == '0') {
                $_SESSION['username'] = $username;
                header("Location: admin");
                exit();
            } else {
                $_SESSION['username'] = $username;
                header("Location: views/Dosen/index.php");
                exit();
            }
        } else {
            header("Location: index.php");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
