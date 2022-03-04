<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_qlnk';
class Process{
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }
        return $connection;
    }
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    function getALL($code, $type, $table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table." WHERE ".$type."='{$code}'";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getALLElements($table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table."";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getCB($code, $type, $table){
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
    function getDate($date){
        $string = explode("-", $date);
        return $string[2].'/'.$string[1].'/'.$string[0];
    }
}
?>