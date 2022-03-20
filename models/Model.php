<?php

class Model{
    public function connectDb() {
        $connection = mysqli_connect('localhost', 'root', '', 'db_qlnk');
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }

        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    function getONE($code, $type, $table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table." WHERE ".$type."='{$code}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getALL($code, $type, $table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table." WHERE ".$type."='{$code}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds;
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getALLElement($table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table;
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds;
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getDate($date){
        if($date!=''){
            $string = explode("-", $date);
            return $string[2].'/'.$string[1].'/'.$string[0];
        }else{
            return '';
        }
    }
    function getCongAnXa($info){
        $mang = explode('.', $info);
        $user = $mang[1];
        $result = $this->getONE($user,'taikhoan', 'taikhoan');
        return $result;
    }
}
?>