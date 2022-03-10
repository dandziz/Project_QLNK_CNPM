<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    $ps = new Process();
    if (isset($_POST['mashk'])) {
        $ma_shk = $_POST['mashk'];
        $sql = "Select* from tb_chitietshk where ma_shk = '{$ma_shk}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 1) {
            ?>
            <h5>Chọn người bạn muốn tách khẩu</h5>
            <select class="form-select mt-1" aria-label="Default select example" id="nguoimuontach">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['chuho'] == 0){
?>
                    <option value="<?php echo $row['cccd'] ?>"><?php echo $row['hoten'] ?></option>
    <?php
        }
    }
        ?>
        </select>
        <button class="btn btn-success mt-1" id="tHTK" type="button">Tiến hành tách khẩu</button>
        <script src="../../js/script.js"></script>
    <?php
    }else{
        echo "<p style='color:black;'>Không tìm thấy sổ hộ khẩu như mã!</p>";
    }
} else {
    header("location: ../index.php");
}
    ?>
<?php
} else {
    header("location: ../../index.php");
}
?>