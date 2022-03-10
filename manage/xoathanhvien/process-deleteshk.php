<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    $ps = new Process();
    if (isset($_GET['mashk']) && isset($_GET['cccd'])) {
        $sql = "Delete from tb_chitietshk where ma_shk = {$_GET['mashk']} and cccd = {$_GET['cccd']}";
        if(mysqli_query($conn, $sql)){
            $done = "Sửa hoàn tất!";
            header("location: ../shkmanage.php?mashk={$_GET['mashk']}&done={$done}");
        }
    }else{
        header("location: ../index.php");
    }
}else{
    header("location: ../../index.php");
}
?>