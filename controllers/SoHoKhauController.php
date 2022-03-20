<?php
session_start();
require_once 'models/SoHoKhauModel.php';

class SoHoKhauController{
    function index(){
        $model = new SoHoKhauModel();
        require_once 'views/SoHoKhau/index.php';
    }
    function timkiemsohokhau(){
        $model = new SoHoKhauModel();
        if(isset($_POST['mashk']) && $_POST['mashk']!=""){
            $check = $model->timkiemsohokhau($_POST['mashk']);
            if($check!=false){
                $row = $model->getONE($_POST['mashk'],'ma_shk','sohokhau');
                $resultct = $model->getallSHK($_POST['mashk']);
                require_once 'views/SoHoKhau/chiTietSoHoKhau.php';
            }else{
                require_once 'views/Error/error.php';
            }
        }else{
            require_once 'views/Error/error.php';
        }
    }
}
?>