<?php

class mahasiswa{
    private $koneksi;

    public function __construct($db){
        $this->koneksi = $db;
    }

    public function getAllmahasiswa(){
        $query = "SELECT * FROM mahasiswa";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getnamabynim($nim){
        $query = "SELECT nama_mhs FROM mahasiswa where nim='$nim'";
        $result = mysqli_query($this->koneksi,$query);
        return $result;
    }

    public function getmahasiswabynim($nim){
        $result = array(); // definisikan $result sebagai array kosong
        $data = mysqli_query($this->koneksi,"select * from mahasiswa where nim='$nim'");
        while($d=mysqli_fetch_array($data)){
            $result[] = $d;
        }
        return $result;
    }
    

    public function inputMahasiswa($nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,$angkatan){
        $query = "INSERT INTO mahasiswa (nim,nama_mhs,prodi_mhs,alamat,ttl,kontak,angkatan) VALUES ('$nim', '$nama_mhs', '$prodi_mhs', '$alamat', '$ttl', '$kontak', '$angkatan')";
        $result = mysqli_query($this->koneksi, $query);
        if($result){
            return true;
        }else{
            return false;
        }

    }

    public function updateMahasiswa($newnim,$nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,$angkatan){
        $query = "UPDATE mahasiswa SET nim ='$newnim', nama_mhs='$nama_mhs', prodi_mhs='$prodi_mhs',
        alamat='$alamat', ttl='$ttl', kontak='$kontak', angkatan='$angkatan' where nim=$nim";
        $result = mysqli_query($this->koneksi,$query);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function deleteMahasiswa($nim){
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $result = mysqli_query($this->koneksi, $query);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getdosbingbynim($nim){
        $query = "SELECT nip FROM pengampu WHERE nim = '$nim'";
        $result = mysqli_query($this->koneksi, $query);
        return $result;
    }

    public function getjurusan(){
        $query = "SELECT id_jur,kode_jur,nama_jurusan FROM jurusan";
        $result = mysqli_query($this->koneksi, $query);
        $jurusan = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $jurusan[] = $row;
        }
        return $jurusan;
    }

    public function getmhsbyjurusan($prodi_mhs){
        $query ="SELECT * FROM mahasiswa WHERE prodi_mhs = '$prodi_mhs'";
        $result = mysqli_query($this->koneksi, $query);
        return $result;
    }

    public function getmhsbynip($nip){
        $query ="SELECT * FROM mahasiswa WHERE nip = '$nip'";
        $result = mysqli_query($this->koneksi, $query);
        return $result;
    }
    }


?>