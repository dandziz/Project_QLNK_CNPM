<?php
require "../config/config.php";
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../index.php');
} else {
    if(isset($_POST['smUpdateshk'])){
        $cccd = $_POST['cccdupdate'];
        $ma_shk = $_POST['ma_shk'];
       
    
        $dbh = new PDO("mysql:host=localhost;dbname=db_qlnk", "root", "");
        $stmt = $dbh->prepare("UPDATE `tb_chitietshk` SET ma_shk = ? where `cccd` = ? ");
        $stmt->bindParam(1, $ma_shk);
        
        $stmt->bindParam(2, $cccd);
        if($stmt->execute()){
            header("location: process-chuyenkhau.php?cccd={$cccd}");
        }else{
            header("location: shkmanage.php");
        }
    }else{
        header("location: process-chuyenkhau.php");
    }
}
?>