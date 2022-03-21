<?php
require_once 'configs/database.php';
class PhanHoiThuTucModel{
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
    public function getThuTucTamTru(){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamtru where xacnhan = 0";
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
    public function getThuTucTamVang(){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamvang where xacnhan = 0";
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
    public function getChiTietTamTru($matt){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamtru where ma_dontt = '{$matt}'";
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
    public function getChiTietTamVang($matv){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tamvang where ma_dontv = '{$matv}'";
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
    public function processTTDONE($TT){
        $connection = $this->connectDb();
        $query = "UPDATE `tamtru` SET `xacnhan`='{$TT['xacnhan']}', `ma_taikhoan`='{$TT['ma_taikhoan']}', ngaybatdau = '{$TT['ngaybatdau']}' WHERE `ma_dontt` = '{$TT['matt']}'";
        $isChangeTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isChangeTT;
    }
    public function processTTHUY($TT){
        $connection = $this->connectDb();
        $query = "UPDATE `tamtru` SET `xacnhan`='{$TT['xacnhan']}', `ma_taikhoan`='{$TT['ma_taikhoan']}' WHERE `ma_dontt` = '{$TT['matt']}'";
        $isChangeTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isChangeTT;
    }
    public function processTVDONE($TV){
        $connection = $this->connectDb();
        $query = "UPDATE `tamvang` SET `xacnhan`='{$TV['xacnhan']}', `ma_taikhoan`='{$TV['ma_taikhoan']}', ngaybatdau = '{$TV['ngaybatdau']}' WHERE `ma_dontv` = '{$TV['matt']}'";
        $isChangeTV = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isChangeTV;
    }
    public function processTVHUY($TV){
        $connection = $this->connectDb();
        $query = "UPDATE `tamvang` SET `xacnhan`='{$TV['xacnhan']}', `ma_taikhoan`='{$TV['ma_taikhoan']}' WHERE `ma_dontv` = '{$TV['matt']}'";
        $isChangeTV = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isChangeTV;
    }
}
?>