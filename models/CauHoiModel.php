<?php
require_once 'configs/database.php';
class CauHoiModel{
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
    public function insertCH($CH = []){
        $connection = $this->connectDb();
        $query = "Insert into cauhoi values('{$CH['mach']}', '{$CH['hoten']}', '{$CH['email']}', '{$CH['sdt']}', '{$CH['lydo']}', '{$CH['ngayhoi']}', '{$CH['trangthai']}', '{$CH['loaicauhoi']}')";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
    public function insertCK($CH = []){
        $connection = $this->connectDb();
        $query = "Insert into cauhoi values('{$CH['mach']}', '{$CH['hoten']}', '{$CH['email']}', '{$CH['sdt']}', '{$CH['lydo']}', '{$CH['ngayhoi']}', '{$CH['trangthai']}', '{$CH['loaicauhoi']}')";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
}
?>