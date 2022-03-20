<?php
require_once 'configs/database.php';
class PhanHoiModel{
    //kết nối csdl
    public function connectDb() {
        $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if (!$connection) {
            die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
        }
        return $connection;
    }
    //đóng kết nối
    public function closeDb($connection = null) {
        mysqli_close($connection);
    }
    //đếm số câu hỏi đang chờ đc xử lý
    public function soCH(){
        $conn = $this->connectDb();
        $querySelect = "SELECT count(ma_cauhoi) as SoCH from cauhoi where ( trangthai = 0 or trangthai = 2 ) and loaicauhoi = 1";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr['SoCH'];
        }else{
            return false;
        }
    }
    //đếm số yêu cầu chuyển khẩu đang chờ đc xử lý
    public function soYCCK(){
        $conn = $this->connectDb();
        $querySelect = "SELECT count(ma_cauhoi) as SoYCCK from cauhoi where ( trangthai = 0 or trangthai = 2 ) and loaicauhoi = 2";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr['SoYCCK'];
        }else{
            return false;
        }
    }
    //đếm số câu hỏi và yêu cầu đã đc xử lý
    public function toTal(){
        $conn = $this->connectDb();
        $querySelect = "SELECT count(ma_cauhoi) as LuuTru from cauhoi where trangthai = 1";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr['LuuTru'];
        }else{
            return false;
        }
    }
    //kiểm tra và lấy ra câu hỏi đang xử lý
    public function getCauHoiDangXuLy(){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where trangthai = 2 and loaicauhoi = 1";
        $resultService = mysqli_query($conn, $querySelect);
        if(mysqli_num_rows($resultService)>0){
            $row = mysqli_fetch_assoc($resultService);
            return $row['ma_cauhoi'];
        }else{
            return false;
        }
    }
    //kiểm tra và lấy ra yêu cầu chuyển khẩu đang xử lý
    public function getChuyenKhauDangXuLy(){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where trangthai = 2 and loaicauhoi = 2";
        $resultService = mysqli_query($conn, $querySelect);
        if(mysqli_num_rows($resultService)>0){
            $row = mysqli_fetch_assoc($resultService);
            return $row['ma_cauhoi'];
        }else{
            return false;
        }
    }
    //lấy danh sách câu hỏi đang chờ
    public function getCauHoi(){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where ( trangthai = 0 or trangthai = 2 ) and loaicauhoi = 1";
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
    //lấy danh sách yêu cầu chuyển khẩu đang chờ
    public function getChuyenKhau(){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where ( trangthai = 0 or trangthai = 2 ) and loaicauhoi = 2";
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
    //lấy danh sách câu hỏi và yêu cầu lưu trữ
    public function getLuuTru(){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where trangthai = 1";
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
    //tìm kiếm câu hỏi
    public function searchCH($ch){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where ( trangthai = 0 or trangthai = 2) and loaicauhoi = 1 and ( email = '{$ch}' or sdt = '{$ch}' or ma_cauhoi = '{$ch}' )";
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
    //tìm kiếm yêu cầu chuyển khẩu
    public function searchCK($ch){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where ( trangthai = 0 or trangthai = 2) and loaicauhoi = 2 and ( email = '{$ch}' or sdt = '{$ch}' or ma_cauhoi = '{$ch}' )";
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
    //tìm kiếm lưu trữ
    public function searchLuuTru($ch){
        $conn = $this->connectDb();
        $querySelect = "SELECT* from cauhoi where trangthai = 1 and ( email = '{$ch}' or sdt = '{$ch}' or ma_cauhoi = '{$ch}' )";
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
    //thêm phản hồi cho câu hỏi
    function insertPHCH($TV = []){
        $connection = $this->connectDb();
        $query = "INSERT INTO `phanhoi`(`ma_phanhoi`, `phanhoi`, `ngayphanhoi`, `ma_taikhoan`, `ma_cauhoi`) 
        VALUES ('{$TV['ma_phanhoi']}','{$TV['phanhoi']}','{$TV['ngayphanhoi']}','{$TV['ma_taikhoan']}','{$TV['ma_cauhoi']}')";
        $isInsertPHCH = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertPHCH;
    }
    //đổi trạng thái cho câu hỏi và yêu cầu chuyển khẩu
    function doiTrangThai($mach, $macauhoi){
        $connection = $this->connectDb();
        $query = "UPDATE `cauhoi` SET `trangthai`= 1, `ma_taikhoan`='$macauhoi' WHERE `ma_cauhoi` = '$mach'";
        $isInsertPHCH = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertPHCH;
    }
    //chuyển trạng thái thành đang xử lý của câu hỏi hoặc yêu cầu chuyển khẩu
    function chuyenTrangThaiXuLy($macauhoi){
        $connection = $this->connectDb();
        $query = "UPDATE `cauhoi` SET `trangthai`= 2 WHERE `ma_cauhoi` = '$macauhoi'";
        $isInsertPHCH = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isInsertPHCH;
    }
    //xóa câu hỏi or yêu cầu chuyển khẩu
    function xoaCauHoi($macauhoi){
        $connection = $this->connectDb();
        $query = "DELETE from `cauhoi` WHERE `ma_cauhoi` = '$macauhoi'";
        $isDeletePHCH = mysqli_query($connection, $query);
        $this->closeDb($connection);
        return $isDeletePHCH;
    }
}
?>