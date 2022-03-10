<?php
require "../../config/config.php";
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../../index.php');
} else {
    if(isset($_POST['smUpdateshk'])){
        $cccd = $_POST['cccdupdate'];
        $canbodangky = $_POST['canbodangky'];
        $truongcongan = $_POST['truongcongan'];
        $hoten = $_POST['hotenupdate'];
        $hotenkhac = $_POST['hotenkhacupdate'];
        $quanhech = $_POST['quanhechupdate'];
        $ngaysinh = $_POST['ngaysinhupdate'];
        $gioitinh = $_POST['gioitinhupdate'];
        $nguyenquan = $_POST['nguyenquanupdate'];
        $dantoc = $_POST['dantocupdate'];
        $tongiao = $_POST['tongiaoupdate'];
        $quoctich = $_POST['quoctichupdate'];
        $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviecupdate'];
        $noithuongtrutruocday = $_POST['noithuongtrutruocdayupdate'];
    
        $dbh = new PDO("mysql:host=localhost;dbname=db_qlnk", "root", "");
        $stmt = $dbh->prepare("UPDATE `tb_chitietshk` SET hoten = ?, hotenkhac = ?, quanhech = ?, 
        ngaysinh = ?, gioitinh = ?, nguyenquan = ?, dantoc = ?, tongiao = ?, quoctich = ?
        , nghenghiepnoilamviec = ?, noithuongtrutruocday = ?, canbodangky = ?, truongcongan = ? where `cccd` = ? ");
        $stmt->bindParam(1, $hoten);
        $stmt->bindParam(2, $hotenkhac);
        $stmt->bindParam(3, $quanhech);
        $stmt->bindParam(4, $ngaysinh);
        $stmt->bindParam(5, $gioitinh);
        $stmt->bindParam(6, $nguyenquan);
        $stmt->bindParam(7, $dantoc);
        $stmt->bindParam(8, $tongiao);
        $stmt->bindParam(9, $quoctich);
        $stmt->bindParam(10, $nghenghiepnoilamviec);
        $stmt->bindParam(11, $noithuongtrutruocday);
        $stmt->bindParam(12, $canbodangky);
        $stmt->bindParam(13, $truongcongan);
        $stmt->bindParam(14, $cccd);
        if($stmt->execute()){
            $sql = "Select* from tb_chitietshk where cccd = '$cccd'";
            $result = mysqli_query($conn, $sql);
            $rowinfoshk = mysqli_fetch_assoc($result);
            $ma_shk = $rowinfoshk['ma_shk'];
            $done = "Sửa thành công!";
            header("location: ../shkmanage.php?mashk=$ma_shk&done=$done");
        }else{
            $done = "Sửa không thành công!";
            header("location: ../shkmanage.php?mashk=$ma_shk&done=$done");
        }
    }else{
        header("location: ../index.php");
    }
}
?>