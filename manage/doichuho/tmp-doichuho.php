<?php
require "../../config/config.php";
require "../../model.php";
$ps = new Process();
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../../index.php');
} else {
    if(isset($_POST['cccd'])){
        $cccd = $_POST['cccd'];
        if($cccd!='x'){
        $result = $ps->getALL($cccd, "cccd", "tb_chitietshk");
        $row = $result[0];
        $resultall = $ps->getALL($row['ma_shk'], "ma_shk", "tb_chitietshk");
        for($i = 0; $i < count($resultall); $i++){
            $rowi = $resultall[$i];
            if($rowi['cccd']!=$cccd){
    ?>
    <div>
        <label for="validationCustom02" class="form-label">Thay đổi quan hệ với chủ hộ</label><br>
        <label for="validationCustom02" class="form-label"><?php echo $rowi['hoten'].': '.$rowi['cccd'] ?></label>
        <input type="text" class="form-control" name="quanhechuho<?php echo $rowi['cccd'] ?>" required>
        <hr>
    </div>
    <?php
            }
        }
        ?>
        <div class="mt-3 d-flex justify-content-center">
            <button class="btn btn-primary" type="submit" id="smUpdateshk" name="btnDoiChuHo" onclick="return confirm('Bạn chắc chắn muốn chuyển đổi chủ hộ?')">Xác Nhận Đổi</button>
        </div>
        <?php
    }
    }else{
        header('location: ../index.php');
    }
}
?>