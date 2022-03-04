<?php
include('../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../model.php');
    $ps = new Process();
    if (isset($_GET['mashk'])) {
        $mashk = $_GET['mashk'];
        $resultca = $ps->getALL("1","loaichucvu","tb_chucvu");
        $resultcb = $ps->getALL("2","loaichucvu","tb_chucvu");
        include('partials-front/header.php');
?>
        <main>
            <div class="container mb-5">
                <h4 class="text-center mt-2">THÊM THÀNH VIÊN CHO SỔ HỘ KHẨU: <?php echo $mashk ?></h4>
                <div class="row">
                    <div class="col-md-8 ms-auto me-auto border border-secondary rounded shadow-sm">
                        <form class="needs-validation" action="process-themthanhvienshk.php" method="POST" novalidate>
                            <div class="row g-3 mt-2">
                                <input type="text" class="form-control" id="validationCustom01" name="mashk" value="<?php echo $mashk ?>" style="display: none;" required>
                                <div class="col-md-6">
                                    <label for="validationCustom01" class="form-label">MÃ CĂN CƯỚC CÔNG DÂN</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="cccd" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">QUAN HỆ VỚI CHỦ HỘ</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="quanhech" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="hoten" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN KHÁC</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="hotenkhac" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">NGÀY SINH</label>
                                    <input type="date" class="form-control" id="validationCustom02" name="ngaysinh" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">GIỚI TÍNH</label>
                                    <select class="form-select" aria-label="Default select example" name="gioitinh">
                                        <option selected value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">NGUYÊN QUÁN</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="nguyenquan" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">DÂN TỘC</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="dantoc" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">TÔN GIÁO</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="tongiao" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">QUỐC TỊCH</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="quoctich" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">NGHỀ NGHIỆP NƠI LÀM VIỆC</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="nghenghiepnoilamviec" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">NƠI THƯỜNG TRÚ TRƯỚC ĐÂY</label>
                                    <input type="text" class="form-control" id="validationCustom02" name="noithuongtrutruocday" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ</label>
                                    <select class="form-select" aria-label="Default select example" name="canbodangky">
                                        <?php
                                        for ($i = 0; $i < count($resultcb); $i++) {
                                            $rowcb = $resultcb[$i];
                                        ?>
                                            <option value="<?php echo $rowcb['ma_chucvu'] ?>"><?php echo $rowcb['hoten'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom02" class="form-label">TRƯỞNG CÔNG AN</label>
                                    <select class="form-select" aria-label="Default select example" name="truongconganb">
                                        <?php
                                        for ($i = 0; $i < count($resultca); $i++) {
                                            $rowca = $resultca[$i];
                                        ?>
                                            <option value="<?php echo $rowca['ma_chucvu'] ?>"><?php echo $rowca['hoten'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary" type="submit" name="btnSubmitAddMSHK">HOÀN TẤT THÊM</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
<?php
        include('partials-front/footer.php');
    } else {
        header("location: index.php");
    }
} else {
    header("location: ../index.php");
}
?>