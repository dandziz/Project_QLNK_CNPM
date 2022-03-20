<?php
require_once '../config/config.php';
class AdminModal{
    private $ma_taikhoan;
    private $taikhoan;
    private $hoten;
    private $chucvu;
    private $conlamviec;
    private $ngaykhoitao;
    private $capbac;
    public function getAllBD(){
        $conn = $this->connectDb();
        $sql = "SELECT * FROM tb_taikhoan";
        $result = mysqli_query($conn, $sql);
        $arr_bd = [];
        if(mysqli_num_rows($result)>0){
            $arr_bd = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        return $arr_bd;
    }
    public function insert($param = []) {
        $connection = $this->connectDb();
        //tạo và thực thi truy vấn
        $queryInsert = "INSERT INTO tb_taikhoan (taikhoan, hoten, chucvu, conlamviec, ngaykhoitao, capbac)
        VALUES ('{$param['taikhoan']}', '{$param['hoten']}', '{$param['chucvu']}', '{$param['conlamviec']}', '{$param['ngaykhoitao']}', '{$param['capbac']}')";
        $isInsert = mysqli_query($connection, $queryInsert);
        $this->closeDb($connection);

        return $isInsert;
    }
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
    public function getBDByMa_taikhoan($ma_taikhoan = null) {
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM tb_taikhoan WHERE ma_taikhoan={$ma_taikhoan}";
        $results = mysqli_query($connection, $querySelect);
        $bdArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $bdArr = $bds[0];
        }
        $this->closeDb($connection);

        return $bdArr;
    }
    public function update($bd = []) {
        $connection = $this->connectDb();
        $queryUpdate = "UPDATE tb_taikhoan 
        SET hoten = '{$bd['hoten']}', chucvu = '{$bd['chucvu']}', conlamviec = '{$bd['conlamviec']}', ngaykhoitao = '{$bd['ngaykhoitao']}', capbac = '{$bd['capbac']}'  WHERE ma_taikhoan = {$bd['ma_taikhoan']}";
        $isUpdate = mysqli_query($connection, $queryUpdate);
        $this->closeDb($connection);

        return $isUpdate;
    }
    public function delete($id = null) {
        $connection = $this->connectDb();

        $queryDelete = "DELETE FROM tb_taikhoan WHERE ma_taikoan = {$ma_taikhoan}";
        $isDelete = mysqli_query($connection, $queryDelete);

        $this->closeDb($connection);

        return $isDelete;
    }
    public function getCount($table){
        $connection = $this->connectDb();

        $queryDelete = "Select* from ".$table;
        $isSelect =false;
        $result = mysqli_query($connection, $queryDelete);
        if(mysqli_num_rows($result)>0){
            $hs = mysqli_fetch_all($result);
            return count($hs);
        }
        $this->closeDb($connection);

        return $isSelect;
    }
}

?>