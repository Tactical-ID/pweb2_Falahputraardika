<?php

class dosen{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }

    public function getAlldosen(){
        $query = "SELECT * FROM dosen";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function inputDosen($nip,$nama_dosen,$jurusan,$alamat,$kontak){
        $query = "INSERT INTO dosen (nip,nama_dosen,jurusan,alamat,kontak) VALUES ('$nip', '$nama_dosen', '$jurusan', '$alamat', '$kontak')";
        $result = mysqli_query($this->koneksi, $query);
        if($result){
            return true;
        }else{
            return false;
        }

    }

    public function updateDosen($newnip,$nip,$nama_dosen,$jurusan,$alamat,$kontak){
        $query = "UPDATE dosen SET nip ='$newnip', nama_dosen='$nama_dosen', jurusan='$jurusan',
        alamat='$alamat', kontak='$kontak' where nip=$nip";
        $result = mysqli_query($this->koneksi,$query);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function deleteDosen($nip){
        $query = "DELETE FROM dosen WHERE nip = '$nip'";
        $result = mysqli_query($this->koneksi, $query);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getdosenbynip($nim){
        $query = "SELECT nip from pengampu where nim ='$nim'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getnamabynip($nip){
        $query = "SELECT * from dosen where nip ='$nip'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

   
}
?>