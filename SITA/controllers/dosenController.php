<?php

include_once '../../models/dosen.php';

class dosenController{

    private $model;

    public function __construct($db){
        $this->model = new dosen($db);
    }

    public function getAlldosen(){
        return $this->model->getAlldosen();
    }

    public function inputDosen($nip,$nama_dosen,$jurusan,$alamat,$kontak){
        return $this->model->inputDosen($nip,$nama_dosen,$jurusan,$alamat,$kontak);

    }

    public function updateDosen($newnip,$nip,$nama_dosen,$jurusan,$alamat,$kontak){
        return $this->model->updateDosen($newnip,$nip,$nama_dosen,$jurusan,$alamat,$kontak);

    }

    public function deleteDosen($nip){
        return $this->model->deleteDosen($nip);

    }



    public function getdosenbynip($nim){
        return $this->model->getdosenbynip($nim);

    }


    public function getnamabynip($nip){
        return $this->model->getnamabynip($nip);
    }
}