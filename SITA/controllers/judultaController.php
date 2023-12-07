<?php

include_once '../../models/judulta.php';

class judultaController{

    private $model;

    public function __construct($db){
        $this->model = new judulta($db);
    }

    public function inputJudul($nim,$nip,$judul,$file_name){
        return $this->model->inputJudul($nim,$nip,$judul,$file_name);
    }

    public function getjudulta(){
        return $this->model->getjudulta();

    }

    public function getjudultabynim($nim){
        return $this->model->getjudultabynim($nim);

    }

    public function getjudultabynip($nip){
        return $this->model->getjudultabynip($nip);

    }

    public function getnimbynip($nip){
        return $this->model->getnimbynip($nip);

    }
    
    public function getjudulbynipnim($nip,$nim){
        return $this->model->getjudulbynipnim($nip,$nim);

    }

    public function updatestatus($nip,$nim,$stat){
        return $this->model->updatestatus($nip,$nim,$stat);

    }


}

?>