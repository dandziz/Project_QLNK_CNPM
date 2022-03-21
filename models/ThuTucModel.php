<?php
require_once 'configs/database.php';
class ThuTucModel{
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
    public function insertTT($TT = []){
        $connection = $this->connectDb();
        $query = "INSERT INTO tamtru (ma_dontt, conganxa, hoten,ngaysinh,cccd,cccd_noicap,cccd_capngay,diachithuongtru,choohiennay,lydo,email, xacnhan, phanhoi) 
        VALUES ('{$TT['madon']}','{$TT['conganxa']}','{$TT['fullname']}','{$TT['birthday']}','{$TT['idcard']}','{$TT['idcard_address']}','{$TT['idcard_date']}','{$TT['address']}','{$TT['address_now']}','{$TT['other']}','{$TT['email']}', 0, '{$TT['feedback']}')";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
    public function insertTV($TT = []){
        $connection = $this->connectDb();
        $query = "INSERT INTO tamvang (ma_dontv, conganxa, hoten,ngaysinh,cccd,cccd_noicap,cccd_capngay,diachithuongtru,choohiennay,lydo,email, xacnhan, phanhoi) 
        VALUES ('{$TT['madon']}','{$TT['conganxa']}','{$TT['fullname']}','{$TT['birthday']}','{$TT['idcard']}','{$TT['idcard_address']}','{$TT['idcard_date']}','{$TT['address']}','{$TT['address_now']}','{$TT['other']}','{$TT['email']}', 0, '{$TT['feedback']}')";
        $isInsertTV = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTV;
    }
}
?>