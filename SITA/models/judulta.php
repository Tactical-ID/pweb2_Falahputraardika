<?php

class judulta{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }

    public function inputJudul($nim,$nip,$judul,$file_name){
        $query = "INSERT INTO judul_ta (nim,nip,judul,proposal) VALUES ('$nim', '$nip', '$judul', '$file_name')";
        $result = mysqli_query($this->koneksi, $query);
        if($result){
            return true;
        }else{
            return false;
        }

    }
    
    public function getjudulta(){
        $query = "SELECT * FROM judul_ta";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getjudultabynim($nim){
        $query = "SELECT judul FROM judul_ta where nim='$nim'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getjudultabynip($nip){
        $query = "SELECT * FROM judul_ta where nip='$nip'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getnimbynip($nip){
        $query = "SELECT * FROM judul_ta where nip='$nip'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
}

public function getjudulbynipnim($nip,$nim){
    $query = "SELECT * FROM judul_ta where nip='$nip' AND nim='$nim'";
    $result = mysqli_query($this->koneksi,$query);
    return $result;
}

public function updatestatus($nip,$nim,$stat){
    $query = "UPDATE judul_ta SET stat = '$stat' WHERE nip='$nip' AND nim='$nim'";
    $result = mysqli_query($this->koneksi,$query);
    return $result;
}
}
?>