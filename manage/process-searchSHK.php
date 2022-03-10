<?php
include('../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../model.php');
    $ps = new Process();
    if (isset($_POST['mashk'])) {
        $mashk = $_POST['mashk'];
        $sql = "Select* from tb_chitietshk where ma_shk = '$mashk' or cccd = '$mashk'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
?>
            <div class="col-md-2 mt-2">
                <div class="card">
                    <img src="../images/background/2.png" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['ma_shk'] ?></h5>
                        <a href="shkmanage.php?mashk=<?php echo $row['ma_shk']?>" class="btn btn-primary">Xem thông tin</a>
                    </div>
                </div>
            </div>
<?php
        }else{
            echo "<p style='color:white;'>Không tìm thấy sổ hộ khẩu như mã!</p>";
        }
    } else {
        header("location: index.php");
    }
} else {
    header("location: ../index.php");
}
?>