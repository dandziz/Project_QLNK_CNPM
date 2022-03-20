<?php
require_once 'configs/database.php';
class CongAnXaModel{
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
    function getCongAnXa($info){
        $mang = explode('.', $info);
        $user = $mang[1];
        $result = $this->getONE($user,'taikhoan', 'taikhoan');
        return $result;
    }
    function insertTV($TV = []){
        $connection = $this->connectDb();
        $query = "INSERT INTO `thanhvienshk`(`ma_shk`, `cccd`, `chuho`, `quanhech`, `hoten`, `hotenkhac`, `ngaysinh`, `gioitinh`, `nguyenquan`, `dantoc`, `tongiao`, `quoctich`, `nghenghiepnoilamviec`, `noithuongtrutruocday`, `ma_taikhoan`) 
        VALUES ('{$TV['ma_shk']}', '{$TV['cccd']}', '{$TV['chuho']}', '{$TV['quanhech']}', '{$TV['hoten']}', '{$TV['hotenkhac']}', '{$TV['ngaysinh']}', '{$TV['gioitinh']}', '{$TV['nguyenquan']}', '{$TV['dantoc']}', '{$TV['tongiao']}', '{$TV['quoctich']}', '{$TV['nghenghiepnoilamviec']}', '{$TV['noithuongtrutruocday']}', '{$TV['ma_taikhoan']}')";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
    function updateTV($TV = []){
        $connection = $this->connectDb();
        $query = "UPDATE `thanhvienshk` SET hoten = '{$TV['hoten']}', hotenkhac = '{$TV['hotenkhac']}', quanhech = '{$TV['quanhech']}', 
        ngaysinh = '{$TV['ngaysinh']}', gioitinh = '{$TV['gioitinh']}', nguyenquan = '{$TV['nguyenquan']}', dantoc = '{$TV['dantoc']}', tongiao = '{$TV['tongiao']}', quoctich = '{$TV['quoctich']}',
         nghenghiepnoilamviec = '{$TV['nghenghiepnoilamviec']}', noithuongtrutruocday = '{$TV['noithuongtrutruocday']}', ma_taikhoan = '{$TV['ma_taikhoan']}' where `cccd` = '{$TV['cccd']}'";
        $isUpdateTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isUpdateTT;
        
    }
    function deleteTV($cccd){
        $connection = $this->connectDb();
        $query = "Delete from thanhvienshk where cccd = '{$cccd}'";
        $isDeleteTV = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isDeleteTV;
    }
    function changeTV($TV = []){
        $connection = $this->connectDb();
        $query = "UPDATE `thanhvienshk` SET ma_shk = '{$TV['ma_shk']}', hoten = '{$TV['hoten']}', hotenkhac = '{$TV['hotenkhac']}', quanhech = '{$TV['quanhech']}', 
        ngaysinh = '{$TV['ngaysinh']}', gioitinh = '{$TV['gioitinh']}', nguyenquan = '{$TV['nguyenquan']}', dantoc = '{$TV['dantoc']}', tongiao = '{$TV['tongiao']}', quoctich = '{$TV['quoctich']}',
         nghenghiepnoilamviec = '{$TV['nghenghiepnoilamviec']}', noithuongtrutruocday = '{$TV['noithuongtrutruocday']}', ma_taikhoan = '{$TV['ma_taikhoan']}' where `cccd` = '{$TV['cccd']}'";
        $isChangeTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isChangeTT;
    }
    function updateTVTK($TV = []){
        $connection = $this->connectDb();
        $query = "UPDATE `thanhvienshk` SET ma_shk = '{$TV['ma_shk']}', hoten = '{$TV['hoten']}', chuho = 1, hotenkhac = '{$TV['hotenkhac']}', quanhech = '', 
        ngaysinh = '{$TV['ngaysinh']}', gioitinh = '{$TV['gioitinh']}', nguyenquan = '{$TV['nguyenquan']}', dantoc = '{$TV['dantoc']}', tongiao = '{$TV['tongiao']}', quoctich = '{$TV['quoctich']}',
         nghenghiepnoilamviec = '{$TV['nghenghiepnoilamviec']}', noithuongtrutruocday = '{$TV['noithuongtrutruocday']}', ma_taikhoan = '{$TV['ma_taikhoan']}' where `cccd` = '{$TV['cccd']}'";
        $isUpdateTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isUpdateTT;
    }
    function insertSHK($SHK = []){
        $connection = $this->connectDb();
        $query = "INSERT INTO `sohokhau`(`ma_shk`, `hotenchuho`, `noithuongtru`, `ngaycap`, `ma_taikhoan`, `thanhpho`) 
        VALUES ('{$SHK['ma_shk']}', '{$SHK['hotenchuho']}', '{$SHK['noithuongtru']}', '{$SHK['ngaycap']}', '{$SHK['ma_taikhoan']}', '{$SHK['thanhpho']}')";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
    function updateCHNew($cccdnew){
        $connection = $this->connectDb();
        $query = "Update thanhvienshk set chuho = 1, quanhech = '' where cccd = '{$cccdnew}'";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
    function updateDoiChuHo($quanhech, $cccd){
        $connection = $this->connectDb();
        $query = "Update thanhvienshk set chuho = 0, quanhech = '{$quanhech}' where cccd = '{$cccd}'";
        $isUpdateDoiChuHo = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isUpdateDoiChuHo;
    }
    function updateSHK($hotenchuho, $ma_shk){
        $connection = $this->connectDb();
        $query = "Update sohokhau set hotenchuho = '{$hotenchuho}' where ma_shk = '{$ma_shk}'";
        $isUpdateDoiChuHo = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isUpdateDoiChuHo;
    }
    function insertChuHo($TV = []){
        $connection = $this->connectDb();
        $query = "INSERT INTO `thanhvienshk`(`ma_shk`, `cccd`, `chuho`, `quanhech`, `hoten`, `hotenkhac`, `ngaysinh`, `gioitinh`, `nguyenquan`, `dantoc`, `tongiao`, `quoctich`, `nghenghiepnoilamviec`, `noithuongtrutruocday`, `ma_taikhoan`) 
        VALUES ('{$TV['ma_shk']}', '{$TV['cccd']}', 1, '', '{$TV['hoten']}', '{$TV['hotenkhac']}', '{$TV['ngaysinh']}', '{$TV['gioitinh']}', '{$TV['nguyenquan']}', '{$TV['dantoc']}', '{$TV['tongiao']}', '{$TV['quoctich']}', '{$TV['nghenghiepnoilamviec']}', '{$TV['noithuongtrutruocday']}', '{$TV['ma_taikhoan']}')";
        $isInsertTT = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertTT;
    }
}
?>