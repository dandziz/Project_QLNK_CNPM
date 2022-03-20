<?php
require_once 'configs/database.php';
class SoHoKhauModel{
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
    public function timkiemsohokhau($mashk){
        $connection = $this->connectDb();
        $query = "Select* from sohokhau where ma_shk = '{$mashk}'";
        $result = mysqli_query($connection, $query);
        $this->closeDb($connection);
        if(mysqli_num_rows($result)>0){
            $mang = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $mang;
        }else{
            return false;
        }
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
    public function getallSHK($mashk){
        $connection = $this->connectDb();
        $query = "Select* from thanhvienshk where ma_shk = '{$mashk}'";
        $result = mysqli_query($connection, $query);
        $this->closeDb($connection);
        $mang = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $mang;
    }
    function getDate($date){
        if($date!=''){
            $string = explode("-", $date);
            return $string[2].'/'.$string[1].'/'.$string[0];
        }else{
            return '';
        }
    }
}
?>