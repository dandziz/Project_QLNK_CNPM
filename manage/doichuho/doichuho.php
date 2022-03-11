<?php
require "../../config/config.php";
require('../partials-front/header.php');
require "../../model.php";
$ps = new Process();
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../../index.php');
} else {
    if (isset($_GET['mashk'])) {
        $ma_shk = $_GET['mashk'];
        $result = $ps->getALL($ma_shk, "ma_shk", "tb_chitietshk");
        for ($i = 0; $i < count($result); $i++) {
            $row = $result[$i];
            if ($row['chuho'] == 1) {
                $cccdch = $row['cccd'];
                $hotench = $row['hoten'];
            }
        }
?>
<head>
    <title>Đổi chủ hộ khẩu</title>
</head>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ms-auto me-auto" style="background-color: #fafafa;">
                        <div class="mt-2 mb-2">
                            <a href="../shkmanage.php?mashk=<?php echo $ma_shk ?>" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                                    arrow_back
                                </span> <span>Quay lại</span> </a>
                        </div>
                        <h4 class="text-center">Chuyển Đổi Chủ Hộ</h4>
                        <div class="col-md-4 bg-white rounded shadow-sm p-2 mb-2">
                            <h6>Mã sổ hộ khẩu: <?php echo $ma_shk ?></h6>
                            <h6>Họ tên chủ hộ: <?php echo $hotench ?></h6>
                            <h6>CCCD chủ hộ: <?php echo $cccdch ?></h5>
                        </div>
                        <form action="process-doichuho.php" class="row" method="POST" validate>
                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Chọn chủ hộ khẩu mới</label>
                                <select class="form-select" aria-label="Default select example" name="cccdchnew" id="cccdchnew">
                                    <option value="x">Vui lòng chọn chủ hộ mới</option>
                                    <?php
                                    for($i = 0; $i < count($result); $i++){
                                        $row = $result[$i];
                                        if($row['chuho']==0){
                                    ?>
                                    <option value="<?php echo $row['cccd'] ?>"><?php echo $row['hoten'] ?></option>
                                    <?php
                                    }
                                }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 tttv">
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php
        require('../partials-front/footer.php');
    } else {
        header("location: ../index.php");
    }
}
?>