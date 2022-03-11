<?php
// session_start();
require "../../config/config.php";
require('../partials-front/header.php');
require "../../model.php";
$ps = new Process();
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../../index.php');
} else {
    if (isset($_GET['cccd'])) {
        $cccd = $_GET['cccd'];
        $sql = "Select* from tb_chitietshk where cccd = '$cccd'";
        $result = mysqli_query($conn, $sql);
        $rowinfoshk = mysqli_fetch_assoc($result);
        $rownc = $ps->getCB($cccd, "cccd", "tb_chitietshk");
        $resultca = $ps->getALL("1", "loaichucvu", "tb_chucvu");
        $resultcb = $ps->getALL("2", "loaichucvu", "tb_chucvu");
?>

        <head>
            <title>Chuyển khẩu</title>
        </head>
        <div class="container" style="margin-top: 72px;">
            <div class="mt-2 mb-2">
                <a href="../shkmanage.php?mashk=<?php echo $rowinfoshk['ma_shk'] ?>" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
            </div>
            <div class="bg-secondary rounded shadow-sm p-2 mb-2 text-white">
                <h5>Mã căn cước: <?php echo $cccd ?></h5>
                <input type="text" readonly style="display: none;" id="cccdmainde" value="<?php echo $cccd ?>">
                <h5>Họ Và Tên : <?php echo $rowinfoshk['hoten'] ?></h5>
                <div class="d-flex">
                    <h5>Số sổ hộ khẩu: <h5 id="mashkcu"><?php echo $rowinfoshk['ma_shk'] ?></h5>
                    </h5>
                </div>

            </div>
            <div class="row mb-5">
                <div class="col-md">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <h5>Chuyển thành viên</h5>
                        </div>
                    </nav>
                    <!-- Chỉnh sửa  -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                            <form action="process-chuyenkhau.php" method="POST" class="form-control mt-3" id="form-check" onsubmit="return check_mashk()" novalidate>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <span class="me-2 fw-bold fs-1">Mã số cccd cần chuyển: </span>
                                    <input class="form-control mt-2" name="cccdupdate" value="<?php echo $cccd; ?>" style="max-width: 150px;" readonly>
                                </div>

                                <div>
                                    <div class="displayblockshk">
                                        <div class="col-md me-1 mt-3">
                                            <label for="exampleInputEmail1" class="form-label fw-bold">Nhập Mã Sổ Hộ Khẩu Mới:</label>
                                            <!-- <select class="form-select" aria-label="Default select example" id="ma_shk" name="ma_shk" required>

                                                <?php
                                                /*
                                                $sqlma_shk = "Select * from tb_sohokhau ";
                                                $resultma_shk = mysqli_query($conn, $sqlma_shk);
                                                if (mysqli_num_rows($resultma_shk)) {
                                                    while ($rowma_shk = mysqli_fetch_assoc($resultma_shk)) {
                                                ?>
                                                        <option value="<?php echo $rowma_shk['ma_shk'] ?>"><?php echo $rowma_shk['ma_shk'] ?></option>
                                                <?php
                                                    }
                                                }
                                                */
                                                ?>
                                            </select> -->
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <input type="text" class="form-control" id="mashk-check" name="mashk-check">
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
                                                if ($rowcb['ma_chucvu'] == $rownc['canbodangky']) {
                                            ?>
                                                    <option value="<?php echo $rowcb['ma_chucvu'] ?>" selected><?php echo $rowcb['hoten'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $rowcb['ma_chucvu'] ?>"><?php echo $rowcb['hoten'] ?></option>
                                            <?php
                                                }
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
                                                if ($rowca['ma_chucvu'] == $rownc['truongcongan']) {
                                            ?>
                                                    <option value="<?php echo $rowca['ma_chucvu'] ?>" selected><?php echo $rowca['hoten'] ?></option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="<?php echo $rowca['ma_chucvu'] ?>"><?php echo $rowca['hoten'] ?></option>
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
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            Validator({
                form: '#form-check',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isRequired('#mashk-check', 'Vui lòng nhập mã căn cước công dân'),
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
require("../partials-front/footer.php");
    }
}

?>
</body>

</html>