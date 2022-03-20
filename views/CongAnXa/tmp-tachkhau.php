<?php
if (isset($_POST['mashk']) && isset($_POST['cccd'])) {
    if (isset($_SESSION['LoginOK'])) {
    } else {
        header("location: ../../index.php");
    }
} else if (isset($_GET['mashk']) && isset($_GET['cccd'])) {
} else {
    header("location: ../index.php");
}
require_once('models/Model.php');
$ps = new Model();
$resultcb = $ps->getALL("2", "capbac", "taikhoan");

if (isset($_POST['mashk']) && isset($_POST['cccd']) || isset($_GET['mashk']) && isset($_GET['cccd'])) {
    if (isset($_POST['mashk']) && isset($_POST['cccd'])) {
        $ma_shkcu = $_POST['mashk'];
        $cccd = $_POST['cccd'];
    } else if (isset($_GET['mashk']) && isset($_GET['cccd'])) {
        $ma_shkcu = $_GET['mashk'];
        $cccd = $_GET['cccd'];
    }
    $rownc = $ps->getONE($cccd, "cccd", "thanhvienshk");
?>
    <div class="col-md-8 ms-auto me-auto mb-5 pt-2 bg-white rounded shadow-sm">
        <h4 class="text-center">THÊM THÔNG TIN CHO SỔ HỘ KHẨU MỚI</h4>
        <form class="needs-validation" action="" method="POST" onsubmit="return checkaddshk2()" id="form-check" validate>
            <div class="row g-3">
                <div class="col-md-12 form-group">
                    <label for="validationCustom01" class="form-label">MÃ SỔ HỘ KHẨU</label>
                    <input type="text" class="form-control" id="mashktk" name="mashk" required>
                    <div class="grmessage-checkshk"><span id='message-checkshk'></span></div>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN CHỦ HỘ</label>
                    <input type="text" class="form-control" value="<?php echo $rownc['hoten'] ?>" id="hotenchuho" name="hotenchuho" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">NƠI THƯỜNG TRÚ</label>
                    <input type="text" class="form-control" id="noithuongtru" name="noithuongtru" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">NGÀY CẤP</label>
                    <input type="date" class="form-control" id="ngaycap" name="ngaycap" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ</label>
                    <select class="form-select" aria-label="Default select example" id="canbodangkya" name="canbodangkya">
                        <?php
                        for ($i = 0; $i < count($resultcb); $i++) {
                            $rowca = $resultcb[$i];
                        ?>
                            <option value="<?php echo $rowca['ma_taikhoan'] ?>"><?php echo $rowca['hoten'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">THÀNH PHỐ</label>
                    <input type="text" class="form-control" id="thanhpho" name="thanhpho" required>
                    <span class="form-message"></span>
                </div>
            </div>
            <div class="row g-3 mt-2">
                <h4 class="text-center">THÔNG TIN CHỦ HỘ</h4>
                <div class="col-md-6 form-group">
                    <label for="validationCustom01" class="form-label">MÃ CĂN CƯỚC CÔNG DÂN</label>
                    <input type="text" class="form-control" id="cccd" value="<?php echo $rownc['cccd'] ?>" name="cccd" readonly required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN CHỦ HỘ</label>
                    <input type="text" class="form-control" id="hoten" value="<?php echo $rownc['hoten'] ?>" name="hoten" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">HỌ VÀ TÊN KHÁC</label>
                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $rownc['hotenkhac'] ?>" name="hotenkhac">
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">NGÀY SINH</label>
                    <input type="date" class="form-control" id="ngaysinh" value="<?php echo $rownc['ngaysinh'] ?>" name="ngaysinh" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">GIỚI TÍNH</label>
                    <select class="form-select" aria-label="Default select example" id="gioitinh" name="gioitinh">
                        <?php
                        if ($rownc['gioitinh'] == "Nam") {
                        ?>
                            <option selected value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        <?php
                        } else {
                        ?>
                            <option value="Nam">Nam</option>
                            <option selected value="Nữ">Nữ</option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">NGUYÊN QUÁN</label>
                    <input type="text" class="form-control" id="nguyenquan" value="<?php echo $rownc['nguyenquan'] ?>" name="nguyenquan" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">DÂN TỘC</label>
                    <input type="text" class="form-control" id="dantoc" value="<?php echo $rownc['dantoc'] ?>" name="dantoc" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">TÔN GIÁO</label>
                    <input type="text" class="form-control" id="tongiao" value="<?php echo $rownc['tongiao'] ?>" name="tongiao">
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">QUỐC TỊCH</label>
                    <input type="text" class="form-control" id="quoctich" value="<?php echo $rownc['quoctich'] ?>" name="quoctich" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">NGHỀ NGHIỆP NƠI LÀM VIỆC</label>
                    <input type="text" class="form-control" id="nghenghiepnoilamviec" value="<?php echo $rownc['nghenghiepnoilamviec'] ?>" name="nghenghiepnoilamviec" required>
                    <span class="form-message"></span>
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">NƠI THƯỜNG TRÚ TRƯỚC ĐÂY</label>
                    <input type="text" class="form-control" id="validationCustom02" value="<?php echo $rownc['noithuongtrutruocday'] ?>" name="noithuongtrutruocday">
                </div>
                <div class="col-md-6 form-group">
                    <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ</label>
                    <select class="form-select" aria-label="Default select example" id="canbodangkyb" name="canbodangkyb">
                        <?php
                        for ($i = 0; $i < count($resultcb); $i++) {
                            $rowcb = $resultcb[$i];
                            if ($rowcb['ma_taikhoan'] == $rownc['ma_taikhoan']) {
                        ?>
                                <option value="<?php echo $rowcb['ma_taikhoan'] ?>" selected><?php echo $rowcb['hoten'] ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $rowcb['ma_taikhoan'] ?>"><?php echo $rowcb['hoten'] ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <span class="form-message"></span>
                </div>
                <div class="col-12 d-flex justify-content-end mb-3">
                    <button class="btn btn-primary" type="submit" name="btnSubmitTachSHK">HOÀN TẤT TÁCH KHẨU</button>
                </div>
            </div>
        </form>
    </div>
    <!-- <script src="../js/script.js"></script> -->
    <!-- <script src="../js/Validator.js"></script> -->
    <script>
        // Validator({
        //     form: '#form-check',
        //     formGroupSelector: '.form-group',
        //     errorSelector: '.form-message',
        //     rules: [
        //         Validator.isRequired('#mashknew', 'Vui lòng nhập mã sổ hộ khẩu mới'),
        //         Validator.isRequired('#hotenchuho', 'Vui lòng nhập họ tên chủ hộ'),
        //         Validator.isRequired('#noithuongtru', 'Vui lòng điền đầy đủ nơi thường trú'),
        //         Validator.isRequired('#ngaycap', 'Vui lòng điền đầy đủ ngày cấp'),
        //         Validator.isRequired('#truongcongana', 'Vui lòng chọn trưởng công an phê duyệt'),
        //         Validator.isRequired('#thanhpho', 'Vui lòng nhập tỉnh/thành phố'),
        //         Validator.isRequired('#cccd', 'Vui lòng nhập mã căn cước công dân'),
        //         Validator.isRequired('#hoten', 'Vui lòng nhập họ tên'),
        //         Validator.isRequired('#ngaysinh', 'Vui lòng chọn ngày sinh'),
        //         Validator.isRequired('#gioitinh', 'Vui lòng chọn giới tính'),
        //         Validator.isRequired('#nguyenquan', 'Vui lòng nhập nguyên quán'),
        //         Validator.isRequired('#dantoc', 'Vui lòng nhập dân tộc'),
        //         Validator.isRequired('#quoctich', 'Vui lòng nhập quốc tịch'),
        //         Validator.isRequired('#nghenghiepnoilamviec', 'Vui lòng điền nghề nghiệp và nơi làm việc'),
        //         Validator.isRequired('#canbodangky', 'Vui lòng chọn cán bộ đăng ký'),
        //         Validator.isRequired('#truongconganb', 'Vui lòng chọn trưởng công an phê duyệt')
        //     ]
        // })
    </script>
<?php
}
//}
?>