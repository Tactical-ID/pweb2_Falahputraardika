<?php

include_once '../../models/logbookm.php';

class logbookController{

    private $model;

    public function __construct($db){
        $this->model = new logbook($db);
    }

    public function getAlllogbook(){
        return $this->model->getAlllogbook();
    }

    public function getlogbookbynim($nim){
        return $this->model->getlogbookbynim($nim);
    }

    public function getlogbookbynip($nip){
        return $this->model->getlogbookbynip($nip);
    }

    public function inputmhslogbook($nip){
        return $this->model->inputmhslogbook($nip);

    }

    public function inputLogbook($nip,$nim,$tgl,$topik,$revisi){
        return $this->model->inputLogbook($nip,$nim,$tgl,$topik,$revisi);
    }
}

?>