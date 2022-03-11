<?php
include('../../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../../model.php');
    include('../partials-front/header.php');
    $ps = new Process();
    $resultca = $ps->getALL("1","loaichucvu","tb_chucvu");
    $resultcb = $ps->getALL("2","loaichucvu","tb_chucvu");
?>
<head>
    <title>Tạo sổ hộ khẩu</title>
</head>
    <main style="background-color: #fafafa;" class="container rounded mt-3 mb-5">
        <div class="col-md-2">
            <a href="../index.php" class="text-decoration-none btn btn-primary"><i class="bi bi-arrow-left"></i> Quay Lại</a>
        </div>
        <div class="container pt-2  ms-3 me-4">
            <h4 class="text-center">TẠO SỔ HỘ KHẨU MỚI</h4>
            <div class="col-md-8 ms-auto me-auto bg-white rounded shadow-sm p-2">
            <span class="note"><strong>Ghi chú: </strong>Các thông tin có dấu <span class="icon-required"> (*)</span> là thông tin bắt buộc phải nhập</span>
                <form class="needs-validation" action="process-addSHK.php" method="POST" id="form-check" novalidate>
                    <div class="row g-3">
                        <div class="col-md-12 form-group">
                            <label for="validationCustom01" class="form-label">MÃ SỔ HỘ KHẨU<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="mashk" name="mashk" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">HỌ VÀ TÊN CHỦ HỘ<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="hotenchuho" name="hotenchuho" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">NƠI THƯỜNG TRÚ<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="noithuongtru" name="noithuongtru" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">NGÀY CẤP<span class="icon-required"> (*)</span></label>
                            <input type="date" class="form-control" id="ngaycap" name="ngaycap" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">TRƯỞNG CÔNG AN<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" name="truongcongana" id="truongcongana">
                                <?php
                                for($i = 0; $i < count($resultca); $i++){
                                    $rowca = $resultca[$i];
                                ?>
                                <option value="<?php echo $rowca['ma_chucvu'] ?>"><?php echo $rowca['hoten'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">THÀNH PHỐ<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="thanhpho" name="thanhpho" required>
                            <span class="form-message"></span>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <h4 class="text-center">THÔNG TIN CHỦ HỘ</h4>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom01" class="form-label">MÃ CĂN CƯỚC CÔNG DÂN<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="cccd" name="cccd" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">HỌ VÀ TÊN CHỦ HỘ<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="hoten" name="hoten" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">HỌ VÀ TÊN KHÁC</label>
                            <input type="text" class="form-control" id="" name="hotenkhac" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">NGÀY SINH<span class="icon-required"> (*)</span></label>
                            <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">GIỚI TÍNH<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" id="gioitinh" name="gioitinh">
                                <option selected value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">NGUYÊN QUÁN<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="nguyenquan" name="nguyenquan" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">DÂN TỘC<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="dantoc" name="dantoc" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">TÔN GIÁO</label>
                            <input type="text" class="form-control" id="validationCustom02" name="tongiao" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">QUỐC TỊCH<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="quoctich" name="quoctich" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">NGHỀ NGHIỆP NƠI LÀM VIỆC<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="nghenghiepnoilamviec" name="nghenghiepnoilamviec" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">NƠI THƯỜNG TRÚ TRƯỚC ĐÂY</label>
                            <input type="text" class="form-control" id="validationCustom02" name="noithuongtrutruocday" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" id="canbodangky" name="canbodangky">
                                <?php
                                for($i = 0; $i < count($resultcb); $i++){
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
                            <label for="validationCustom02" class="form-label">TRƯỞNG CÔNG AN<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" id="truongconganb" name="truongconganb">
                                <?php
                                for($i = 0; $i < count($resultca); $i++){
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
                            <button class="btn btn-primary" type="submit" name="btnSubmitAddSHK">HOÀN TẤT ĐĂNG KÝ</button>
                        </div>
                    </div>
                </form>
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
                Validator.isRequired('#mashk', 'Vui lòng nhập mã sổ hộ khẩu'),
                Validator.isRequired('#hotenchuho', 'Vui lòng điền đầy đủ họ tên chủ hộ'),
                Validator.isRequired('#noithuongtru', 'Vui lòng điền đầy nơi thường trú'),
                Validator.isRequired('#ngaycap', 'Chọn ngày cấp'),
                Validator.isRequired('#truongcongana', 'Vui lòng chọn công an'),
                Validator.isRequired('#thanhpho', 'Vui lòng nhập thành phố'),
                Validator.isRequired('#cccd', 'Vui lòng điền CCCD/CMND'),
                Validator.isRequired('#hoten', 'Vui lòng điền họ tên'),
                Validator.isRequired('#ngaysinh', 'Vui lòng điền trường này'),
                Validator.isRequired('#gioitinh', 'Vui lòng chọn giới tính'),
                Validator.isRequired('#nguyenquan', 'Vui lòng nhập nguyên quán'),
                Validator.isRequired('#dantoc', 'Vui lòng nhập dân tộc'),
                Validator.isRequired('#quoctich', 'Vui lòng nhập đúng quốc tịch'),
                Validator.isRequired('#nghenghiepnoilamviec', 'Vui lòng nhập đúng nghề nghiệp nơi làm việc'),
                Validator.isRequired('#canbodangky', 'Vui lòng chọn đúng cán bộ'),
                Validator.isRequired('#truongconganb', 'Vui lòng chọn đúng công an xã')
            ]
        })
    </script>
<?php
include("../partials-front/footer.php");
} else {
    header("location: ../../index.php");
}
?>