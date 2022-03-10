<?php
require "../../config/config.php";
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../../index.php');
} else {
    // if(isset($_POST['cccd'])){
        $count = 0;
        $cccd = $_POST['cccdupdate'];
        $ma_shk = $_POST['mashk-check'];
        $hoten = $_POST['hoten'];
        $hotenkhac = $_POST['hotenkhac'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $nguyenquan = $_POST['nguyenquan'];
        $dantoc = $_POST['dantoc'];
        $tongiao = $_POST['tongiao'];
        $quoctich = $_POST['quoctich'];
        $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviec'];
        $noithuongtrutruocday = $_POST['noithuongtrutruocday'];
        $canbodangky = $_POST['canbodangky'];
        $truongconganb = $_POST['truongconganb'];
        $dbh = new PDO("mysql:host=localhost;dbname=db_qlnk", "root", "");
        $chuho = false;
        $quanhech = $_POST['quanhech'];
        $tamvang = false;
        $stmt = $dbh->prepare("UPDATE `tb_chitietshk` SET `ma_shk`= ?,`chuho`= ?,`quanhech`= ?,`hoten`= ?,`hotenkhac`= ?,`ngaysinh`= ?,`gioitinh`= ?,`nguyenquan`= ?,`dantoc`= ?,`tongiao`= ?,`quoctich`= ?,`nghenghiepnoilamviec`= ?,`noithuongtrutruocday`= ?,`canbodangky`= ?,`truongcongan`= ?,`tamvang`= ? WHERE `cccd`= ?");
        $stmt->bindParam(1, $ma_shk);
        $stmt->bindParam(2, $chuho);
        $stmt->bindParam(3, $quanhech);
        $stmt->bindParam(4, $hoten);
        $stmt->bindParam(5, $hotenkhac);
        $stmt->bindParam(6, $ngaysinh);
        $stmt->bindParam(7, $gioitinh);
        $stmt->bindParam(8, $nguyenquan);
        $stmt->bindParam(9, $dantoc);
        $stmt->bindParam(10, $tongiao);
        $stmt->bindParam(11, $quoctich);
        $stmt->bindParam(12, $nghenghiepnoilamviec);
        $stmt->bindParam(13, $noithuongtrutruocday);
        $stmt->bindParam(14, $canbodangky);
        $stmt->bindParam(15, $truongconganb);
        $stmt->bindParam(16, $tamvang);
        $stmt->bindParam(17, $cccd);
        if($stmt->execute()){
            $count++;
        }
        $sql = "Select* from tb_chitietshk where cccd = '$cccd'";
        $result = mysqli_query($conn, $sql);
        $rowinfoshk = mysqli_fetch_assoc($result);
        $ma_shk = $rowinfoshk['ma_shk'];
        if($count==1){
            $done = "Chuyển khẩu thành công!";
            header("location: ../shkmanage.php?mashk=$ma_shk&done=$done");
        }else{
            $done = "Chuyển khẩu không thành công!";
            header("location: ../shkmanage.php?mashk=$ma_shk&done=$done");
        }
    // }else{
    //     //header("location: ../index.php");
    // }
}
?>