<?php

class logbook{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }

    public function getAlllogbook(){
        $query = "SELECT * FROM bimbingan";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getlogbookbynim($nim){
        $query = "SELECT * FROM bimbingan where nim = '$nim'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getlogbookbynip($nip){
        $query = "SELECT * FROM bimbingan where nip = '$nip'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function inputmhslogbook($nip){
        $query = "SELECT nim, nama_mhs FROM mahasiswa where nip = '$nip'";
        $result = mysqli_query($this->koneksi, $query);
        $mahasiswaArray = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $mahasiswaArray[] = $row;
        }
        return $mahasiswaArray;
    }

    public function inputLogbook($nip,$nim,$tgl,$topik,$revisi){
        $query = "INSERT INTO bimbingan (nip, nim, tgl, topik, revisi) VALUES ('$nip', '$nim', '$tgl', '$topik', '$revisi')";
        $result = mysqli_query($this->koneksi, $query);
        if($result){
            return true;
        }else{
            return false;
        }

    }
}
?>