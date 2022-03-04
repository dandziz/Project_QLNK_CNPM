<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_tournew';
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
    public function getUser($idUser){
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM tb_user WHERE id_user={$idUser}";
        $results = mysqli_query($connection, $querySelect);
        $nvArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $userArr = $bds[0];
        }
        $this->closeDb($connection);

        return $userArr;
    }
    public function getTour($idTour){
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM tb_tour WHERE tour_code='{$idTour}'";
        $results = mysqli_query($connection, $querySelect);
        $tourArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $tourArr = $bds[0];
        }
        $this->closeDb($connection);

        return $tourArr;
    }
    //lấy các loại trang 
    public function getTypePage(){
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM tb_typepage";
        $results = mysqli_query($connection, $querySelect);
        $tourArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $tourArr = $bds;
        }
        $this->closeDb($connection);

        return $tourArr;
    }
    //lấy thông tin 1 ngày đặt tour
    public function getStartEndDay($idse){
        $connection = $this->connectDb();
        $querySelect = "SELECT * FROM tb_startendday WHERE id_startendday='{$idse}'";
        $results = mysqli_query($connection, $querySelect);
        $SEDArr = [];
        if (mysqli_num_rows($results) > 0) {
            $bds = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
        }
        $this->closeDb($connection);

        return $SEDArr;
    }
    //lấy thông tin những ngày đặt tour của 1 tour
    function getSETour($tour_code){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_startendday where tour_code = '{$tour_code}' and startday >= CURDATE() and status_startendday = 1 ORDER by startday";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    //
    function tourcart($id_user){
        $conn = $this->connectDb();
        $sqlcart = "Select* from tb_tourcart where id_user = {$id_user}";
        $resultcart = mysqli_query($conn, $sqlcart);
        $SEDArr = [];
        if(mysqli_num_rows($resultcart)>0){
            $bds = mysqli_fetch_all($resultcart, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    //lấy ra dịch vụ của 1 tour
    function getTourServive($tour_code){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourservice where tour_code = '{$tour_code}' and `lock_service` = 0";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $bds;
        }else{
            return false;
        }
    }
    //lấy ra 1 dịch vụ
    function getOneServive($idser){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourservice where id_tourservice = '{$idser}'";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bds = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bds[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    //Lấy danh sách đặt tour của User
    function getBookingTourChoUser($iduser){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourbooking where id_user = {$iduser} and status_bookingtour = 0";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getBookingTourDPVUser($iduser){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourbooking where id_user = {$iduser} and status_bookingtour = 1 and complete = 0";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getBookingTourHTUser($iduser){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourbooking where id_user = {$iduser} and status_bookingtour = 1 and complete = 1";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getBookingTourChoOperator($idtour){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourbooking where tour_code = '{$idtour}' and status_bookingtour = 0";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function getBookingTourHTOperator($idtour){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourbooking where tour_code = '{$idtour}' and status_bookingtour = 1";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    //lấy dịch vụ của 1 đơn đặt tour
    function getservicebooktour($code){
        $conn = $this->connectDb();
        $sqlServive = "Select* from tb_tourservicebookingtour, tb_tourservice where code_bookingtour = '{$code}' and tb_tourservice.id_tourservice = tb_tourservicebookingtour.id_tourservice";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $SEDArr = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            return $SEDArr;
        }else{
            return false;
        }
    }
    function checkTour($code){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM tb_tour WHERE tour_code='{$code}' and `lock` = 0";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            return true;
        }else{
            return false;
        }
    }
    //lấy toàn bộ dữ liệu từ các bảng
    function getALLElements($check, $id, $table){
        $conn = $this->connectDb();
        $sqlServive = "Select* from ".$table." where ".$check." = {$id}";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bd = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bd[0];
            return $SEDArr;
        }else{
            return false;
        }
    }
    function checkLockElement($code, $type, $table){
        $conn = $this->connectDb();
        $querySelect = "SELECT * FROM ".$table." WHERE ".$type."='{$code}' and `lock` = 0";
        $resultService = mysqli_query($conn, $querySelect);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            return true;
        }else{
            return false;
        }
    }
    function getDGTour($tour_code){
        $conn = $this->connectDb();
        $sqlServive = "Select avg(review) as treview from tb_tourbooking WHERE complete = 1 AND tour_code = '{$tour_code}'";
        $resultService = mysqli_query($conn, $sqlServive);
        $SEDArr = [];
        if(mysqli_num_rows($resultService)>0){
            $bd = mysqli_fetch_all($resultService, MYSQLI_ASSOC);
            $SEDArr = $bd[0]['treview'];
            return $SEDArr;
        }else{
            return false;
        }
    }
}
?>