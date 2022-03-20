<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
?>
    <head>
        <title>Chuyển khẩu</title>
    </head>
    <main>
        <div class="container">
            <h2 class="text-center mt-2 text-uppercase">chuyển khẩu</h2>
            <div class="mt-2 mb-2 col-md-3">
                <a href="index.php?controller=CongAnXa&action=quanlyshk&mashk=<?php echo $rownc['ma_shk'] ?>" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
            </div>
            <div class="bg-secondary rounded shadow-sm p-2 mb-2 text-white">
                <h5 class="text-uppercase">Mã căn cước: <?php echo $cccd ?></h5>
                <input type="text" readonly style="display: none;" id="cccdmainde" value="<?php echo $cccd ?>">
                <h5 class="text-uppercase">Họ Và Tên người cần chuyển: <?php echo $rownc['hoten'] ?></h5>
                <div class="d-flex">
                    <h5 class="text-uppercase">Số sổ hộ khẩu: <?php echo $rownc['ma_shk'] ?></h5>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            
                        </div>
                    </nav>
                    <!-- Chỉnh sửa  -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <form action="" method="POST" class="form-control mt-3" id="form-check" onsubmit="return check_mashk()" validate>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <span class="me-2 fw-bold fs-5 text-uppercase">Mã số căn cước công dân cần chuyển: </span>
                                    <input class="form-control mt-2" id="cccdupdate" name="cccdupdate" value="<?php echo $cccd; ?>" style="max-width: 150px;" readonly>
                                </div>

                                <div>
                                    <div class="displayblockshk">
                                        <div class="col-md me-1 mt-3">
                                            <label for="exampleInputEmail1" class="form-label fw-bold">Nhập Mã Sổ Hộ Khẩu Mới:</label>
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <input type="text" class="form-control" id="mashk-check" name="mashk-check" required>
                                                    <span class="form-message"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" type="button" id="button-checkSHK">Kiểm tra</button>
                                                </div>
                                                <div class="col-md-12" id="info-checkSHK">
                                                    <small class='check-shk'></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row g-3 mt-2">
                                    <h4 class="text-center">THAY ĐỔI THÔNG TIN NGƯỜI CẦN CHUYỂN KHẨU</h4>
                                    <div class="col-md-6 form-group">
                                        <label for="validationCustom02" class="form-label">QUAN HỆ VỚI CHỦ HỘ</label>
                                        <input type="text" class="form-control" id="quanhech" name="quanhech" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="validationCustom02" class="form-label">HỌ VÀ TÊN</label>
                                        <input type="text" class="form-control" id="hoten" value="<?php echo $rownc['hoten'] ?>" name="hoten" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6">
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
                                        <select class="form-select" aria-label="Default select example" id="gioitinh" name="gioitinh" required>
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
                                        <input type="text" class="form-control" id="validationCustom02" value="<?php echo $rownc['tongiao'] ?>" name="tongiao">
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
                                        <select class="form-select" aria-label="Default select example" id="canbodangky" name="canbodangky">
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
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit" id="smUpdateshk" name="smUpdateshk" onclick="return confirm('Bạn chắc chắn muốn chuyển?')">Xác Nhận Chuyển</button>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
    require("views/partials-front/footer.php");
} else {
    header("location: index.php");
}
?>