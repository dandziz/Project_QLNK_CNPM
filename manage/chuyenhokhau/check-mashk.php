<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    $ps = new Process();
    if (isset($_POST['mashk'])) {
        $ma_shk = $_POST['mashk'];
        $sql = "Select* from tb_sohokhau where ma_shk = '$ma_shk'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            echo "<small class='check-shk' style='color:green;'>Sổ hộ khẩu chính xác!</small>";
        }else{
            echo "<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>";
        }
        ?>
        
        <?php
    }else{
        header("location: ../index.php");
    }
}else{
    header("location: ../../index.php");
}
?>