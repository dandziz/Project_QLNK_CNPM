<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    $ps = new Process();
    if (isset($_GET['mashk'])) {
        $mashk = $_GET['mashk'];
        $resultca = $ps->getALL("1", "loaichucvu", "tb_chucvu");
        $resultcb = $ps->getALL("2", "loaichucvu", "tb_chucvu");
        include('../partials-front/header.php');
?>
        <main>
            <div class="container mb-5">
                <div class="mt-2 mb-2">
                    <a href="../shkmanage.php?mashk=<?php echo $mashk ?>" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                            arrow_back
                        </span> <span>Quay lại</span> </a>
                </div>
                <h4 class="text-center mt-2">THÊM THÀNH VIÊN CHO SỔ HỘ KHẨU: <?php echo $mashk ?></h4>
                <div class="row">
                    <div class="col-md-8 ms-auto me-auto border border-secondary rounded shadow-sm">
                        <form class="needs-validation" action="process-themthanhvienshk.php" method="POST" id="form-check" novalidate>
                            <div class="row g-3 mt-2">
                                <input type="text" class="form-control" id="validationCustom01" name="mashk" value="<?php echo $mashk ?>" style="display: none;" required>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom01" class="form-label">MÃ CĂN CƯỚC CÔNG DÂN</label>
                                    <input type="text" class="form-control" id="cccd" name="cccd" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">QUAN HỆ VỚI CHỦ HỘ</label>
                                    <input type="text" class="form-control" id="quanhech" name="quanhech" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN</label>
                                    <input type="text" class="form-control" id="hoten" name="hoten" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN KHÁC</label>
                                    <input type="text" class="form-control" id="hotenkhac" name="hotenkhac">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">NGÀY SINH</label>
                                    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">GIỚI TÍNH</label>
                                    <select class="form-select" aria-label="Default select example" id="gioitinh" name="gioitinh">
                                        <option selected value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">NGUYÊN QUÁN</label>
                                    <input type="text" class="form-control" id="nguyenquan" name="nguyenquan" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">DÂN TỘC</label>
                                    <input type="text" class="form-control" id="dantoc" name="dantoc" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">TÔN GIÁO</label>
                                    <input type="text" class="form-control" id="tongiao" name="tongiao">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">QUỐC TỊCH</label>
                                    <input type="text" class="form-control" id="quoctich" name="quoctich" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">NGHỀ NGHIỆP NƠI LÀM VIỆC</label>
                                    <input type="text" class="form-control" id="nghenghiepnoilamviec" name="nghenghiepnoilamviec" required>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">NƠI THƯỜNG TRÚ TRƯỚC ĐÂY</label>
                                    <input type="text" class="form-control" id="noithuongtrutruocday" name="noithuongtrutruocday">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ</label>
                                    <select class="form-select" aria-label="Default select example" id="canbodangky" name="canbodangky">
                                        <?php
                                        for ($i = 0; $i < count($resultcb); $i++) {
                                            $rowcb = $resultcb[$i];
                                        ?>
                                            <option value="<?php echo $rowcb['ma_chucvu'] ?>"><?php echo $rowcb['hoten'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="form-message"></span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom02" class="form-label">TRƯỞNG CÔNG AN</label>
                                    <select class="form-select" aria-label="Default select example" id="truongconganb" name="truongconganb">
                                        <?php
                                        for ($i = 0; $i < count($resultca); $i++) {
                                            $rowca = $resultca[$i];
                                        ?>
                                            <option value="<?php echo $rowca['ma_chucvu'] ?>"><?php echo $rowca['hoten'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="form-message"></span>
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
        <script src="../js/Validator.js"></script>
        <script>
            Validator({
                form: '#form-check',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#cccd', 'Vui lòng nhập mã căn cước công dân'),
                    Validator.isRequired('#quanhech', 'Vui lòng điền quan hệ với chủ hộ'),
                    Validator.isRequired('#hoten', 'Vui lòng điền đầy đủ họ tên'),
                    Validator.isRequired('#ngaysinh', 'Vui lòng điền đầy đủ ngày sinh'),
                    Validator.isRequired('#gioitinh', 'Vui lòng chọn giới tính'),
                    Validator.isRequired('#nguyenquan', 'Vui lòng điền đầy đủ nguyên quán'),
                    Validator.isRequired('#dantoc', 'Vui lòng nhập dân tộc'),
                    Validator.isRequired('#quoctich', 'Vui lòng nhập quốc tịch'),
                    Validator.isRequired('#nghenghiepnoilamviec', 'Vui lòng điền nghề nghiệp và nơi làm việc'),
                    Validator.isRequired('#canbodangky', 'Vui lòng chọn cán bộ đăng ký'),
                    Validator.isRequired('#truongconganb', 'Vui lòng chọn trưởng công an phê duyệt')
                ]
            })
        </script>
<?php
        include('../partials-front/footer.php');
    } else {
        header("location: ../index.php");
    }
} else {
    header("location: ../../index.php");
}
?>