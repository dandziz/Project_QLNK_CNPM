<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
?>
<head>
    <title>Thêm thành viên</title>
</head>
        <main>
            <div class="container mb-5">
                <div class="mt-2 mb-2">
                    <a href="index.php?controller=CongAnXa&action=quanlyshk&mashk=<?php echo $ma_shk ?>" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                            arrow_back
                        </span> <span>Quay lại</span> </a>
                </div>
                <h4 class="text-center mt-2">THÊM THÀNH VIÊN CHO SỔ HỘ KHẨU: <?php echo $ma_shk ?></h4>
                <div class="row">
                    <div class="col-md-8 ms-auto me-auto border border-secondary rounded shadow-sm">
                        <form class="needs-validation" action="index.php?controller=CongAnXa&action=themthanhvien&mashk=<?php echo $ma_shk ?>" method="POST" onsubmit="return checkaddshk3()" id="form-check" validate>
                            <div class="row g-3 mt-2">
                                <input type="text" class="form-control" id="validationCustom01" name="mashk" value="<?php echo $ma_shk ?>" style="display: none;" required>
                                <div class="col-md-6 form-group">
                                    <label for="validationCustom01" class="form-label">MÃ CĂN CƯỚC CÔNG DÂN</label>
                                    <input type="text" class="form-control" id="cccd" name="cccd" required>
                                    <div class="grmessage-checkcccd"><span id='message-checkcccd'></span></div>
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
                                        <option value="<?php echo $ma_taikhoan ?>" selected><?php echo $conganxa['hoten'] ?></option>
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

<?php
require("views/partials-front/footer.php");
}else{
    header("location: index.php");
}
?>