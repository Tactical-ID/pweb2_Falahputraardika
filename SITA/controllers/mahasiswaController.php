<?php

include_once '../../models/mahasiswa.php';

class mahasiswaController{

    private $model;

    public function __construct($db){
        $this->model = new mahasiswa($db);
    }

    public function getAllmahasiswa(){
        return $this->model->getAllmahasiswa();
    }

    public function getnamabynim($nim){
        return $this->model->getnamabynim($nim);
    }

    public function inputMahasiswa($nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,$angkatan){
        return $this->model->inputMahasiswa($nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,$angkatan);

    }

    public function updateMahasiswa($newnim,$nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,$angkatan){
        return $this->model->updateMahasiswa($newnim,$nim,$nama_mhs,$prodi_mhs,$alamat,$ttl,$kontak,$angkatan);

    }

    public function getmahasiswabynim($nim){
        return $this->model->getmahasiswabynim($nim);

    }

    public function deleteMahasiswa($nim){
        return $this->model->deleteMahasiswa($nim);

    }

    public function getdosbingbynim($nim){
        return $this->model->getdosbingbynim($nim);

    }

    public function getjurusan(){
        return $this->model->getjurusan();

    }

    public function getmhsbyjurusan($prodi_mhs){
        return $this->model->getmhsbyjurusan($prodi_mhs);

    }

    public function getmhsbynip($nip){
        return $this->model->getmhsbynip($nip);

    }






}