<?php
require "../../config/config.php";
require "../../model.php";
$ps = new Process();
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../../index.php');
} else {
    if (isset($_POST['btnDoiChuHo'])) {
        $count = 0;
        $cccdnew = $_POST['cccdchnew'];
        $sql = "Update tb_chitietshk set chuho = 1, quanhech = '' where cccd = '{$cccdnew}'";
        if(mysqli_query($conn, $sql)){
            $count++;
        }
        $result = $ps->getALL($cccdnew, "cccd", "tb_chitietshk");
        $row = $result[0];
        $resultall = $ps->getALL($row['ma_shk'], "ma_shk", "tb_chitietshk");
        for($i = 0; $i < count($resultall); $i++){
            $rowi = $resultall[$i];
            if($rowi['cccd']!=$cccdnew){
                $quanhech = $_POST['quanhechuho'.$rowi['cccd']];
                $sql = "Update tb_chitietshk set chuho = 0, quanhech = '{$quanhech}' where cccd = '{$rowi['cccd']}'";
                if(mysqli_query($conn, $sql)){
                    $count++;
                }
            }
        }
        if(count($resultall)==$count){
            $done = "Thay đổi chủ hộ hoàn tất!";
            header("location: ../shkmanage.php?mashk={$row['ma_shk']}&done=$done");
        }
    }
}
?>