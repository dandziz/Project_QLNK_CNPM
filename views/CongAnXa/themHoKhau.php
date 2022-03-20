<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
?>

    <head>
        <title>Thêm hộ khẩu</title>
    </head>
    <main style="background-color: #fafafa;" class="container rounded mt-3 mb-5">
        <div class="col-md-2">
            <a href="index.php?controller=CongAnXa&action=index" class="text-decoration-none btn btn-primary"><i class="bi bi-arrow-left"></i> Quay Lại</a>
        </div>
        <div class="container pt-2  ms-3 me-4">
            <h4 class="text-center">TẠO SỔ HỘ KHẨU MỚI</h4>
            <div class="col-md-8 ms-auto me-auto bg-white rounded shadow-sm p-2">
                <?php
                if(isset($_GET['error'])){
                    echo "<h4>{$_GET['error']}</h4>";
                }
                ?>
                <span class="note"><strong>Ghi chú: </strong>Các thông tin có dấu <span class="icon-required"> (*)</span> là thông tin bắt buộc phải nhập</span>
                <form class="needs-validation" action="" method="POST" id="form-check" onsubmit="return checkaddshk()" validate>
                    <div class="row g-3">
                        <div class="col-md-12 form-group">
                            <label for="validationCustom01" class="form-label">MÃ SỔ HỘ KHẨU<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="mashktk" name="mashk" required>
                            <span class="form-message"></span>
                            <div class="grmessage-checkshk"><span id='message-checkshk'></span></div>
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
                            <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" name="truongcongana" id="truongcongana">
                                <?php
                                for ($i = 0; $i < count($resultca); $i++) {
                                    $rowca = $resultca[$i];
                                    if($rowca['ma_taikhoan']==$ma_taikhoan){
                                ?>
                                    <option value="<?php echo $rowca['ma_taikhoan'] ?>" selected><?php echo $rowca['hoten'] ?></option>
                                <?php
                                    }else{
                                        ?>
                                        <option value="<?php echo $rowca['ma_taikhoan'] ?>"><?php echo $rowca['hoten'] ?></option>
                                        <?php
                                }
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
                            <div class="grmessage-checkcccd"><span id='message-checkcccd'></span></div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">HỌ VÀ TÊN CHỦ HỘ<span class="icon-required"> (*)</span></label>
                            <input type="text" class="form-control" id="hoten" name="hoten" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">HỌ VÀ TÊN KHÁC</label>
                            <input type="text" class="form-control" id="" name="hotenkhac">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">NGÀY SINH<span class="icon-required"> (*)</span></label>
                            <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" required>
                            <span class="form-message"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">GIỚI TÍNH<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" id="gioitinh" name="gioitinh" required>
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
                            <input type="text" class="form-control" id="validationCustom02" name="noithuongtrutruocday">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="validationCustom02" class="form-label">CÁN BỘ ĐĂNG KÝ<span class="icon-required"> (*)</span></label>
                            <select class="form-select" aria-label="Default select example" name="canbodangky" id="canbodangky">
                                <?php
                                for ($i = 0; $i < count($resultca); $i++) {
                                    $rowca = $resultca[$i];
                                    if($rowca['ma_taikhoan']==$ma_taikhoan){
                                ?>
                                    <option value="<?php echo $rowca['ma_taikhoan'] ?>" selected><?php echo $rowca['hoten'] ?></option>
                                <?php
                                    }else{
                                        ?>
                                        <option value="<?php echo $rowca['ma_taikhoan'] ?>"><?php echo $rowca['hoten'] ?></option>
                                        <?php
                                }
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
<?php
    require("views/partials-front/footer.php");
} else {
    header("location: index.php");
}
?>