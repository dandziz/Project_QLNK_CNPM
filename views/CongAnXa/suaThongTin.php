<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
?>

    <head>
        <title>Sửa thông tin</title>
    </head>
    <main>
        <div class="container">
            <h2 class="text-center mt-2 text-uppercase">Sửa thông tin cho người dân</h2>
            <div class="mt-2 mb-2">
                <a href="index.php?controller=CongAnXa&action=quanlyshk&mashk=<?php echo $rowinfoshk['ma_shk'] ?>" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
            </div>
            <div class="bg-secondary rounded shadow-sm p-2 mb-2 text-white">
                <h5>Mã căn cước: <?php echo $cccd ?></h5>
                <input type="text" readonly style="display: none;" id="cccdmainde" value="<?php echo $cccd ?>">
                <h5>Họ Và Tên : <?php echo $rowinfoshk['hoten'] ?></h5>
                <h5>Số sổ hộ khẩu: <?php echo $rowinfoshk['ma_shk'] ?></h5>

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
                            <form action="" method="POST" id="form-check" validate>
                                <div class="d-flex flex-row align-items-center justify-content-between">
                                    <span class="me-2 fw-bold fs-5">Mã số cccd của người cần sửa: </span>
                                    <input class="form-control mt-2" name="cccdupdate" value="<?php echo $cccd; ?>" style="max-width: 150px;" readonly>
                                </div>
                                <div class="row border rounded mt-2">
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Cán bộ đăng ký</label>
                                        <select class="form-select" aria-label="Default select example" id="canbodangky" name="canbodangky" required>
                                            <?php
                                            $sqlcanbodangky = "Select* from taikhoan where capbac = 2";
                                            $conn = mysqli_connect('localhost', 'root', '', 'db_qlnk');
                                            $resultcanbodangky = mysqli_query($conn, $sqlcanbodangky);
                                            if (mysqli_num_rows($resultcanbodangky) > 0) {
                                                while ($rowcanbodangky = mysqli_fetch_assoc($resultcanbodangky)) {
                                                    if($rowcanbodangky['ma_taikhoan']==$rowinfoshk['ma_taikhoan']){
                                            ?>
                                                        <option value="<?php echo $rowcanbodangky['ma_taikhoan'] ?>" selected><?php echo $rowcanbodangky['hoten'] ?></option>
                                                    <?php
                                                    }else{
                                                    ?>
                                                    <option value="<?php echo $rowcanbodangky['ma_taikhoan'] ?>"><?php echo $rowcanbodangky['hoten'] ?></option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">

                                        <label for="exampleInputEmail1" class="form-label fw-bold">Họ và tên</label>
                                        <input type="text" class="form-control informationshkupdate" id="hotenupdate" name="hotenupdate" value="<?php echo $rowinfoshk['hoten'] ?>" aria-describedby="emailHelp" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Họ và tên khác</label>
                                        <input type="text" class="form-control informationshkupdate" name="hotenkhacupdate" value="<?php echo $rowinfoshk['hotenkhac'] ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Quan hệ với chủ hộ (Chủ hộ thì để trống)</label>
                                        <input type="text" class="form-control informationshkupdate" name="quanhechupdate" value="<?php echo $rowinfoshk['quanhech'] ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="validationCustom02" class="form-label">Ngày sinh</label>
                                        <input type="date" class="form-control informationshkupdate" id="ngaysinhupdate" name="ngaysinhupdate" id="validationCustom02" value="<?php echo $rowinfoshk['ngaysinh'] ?>" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Giới tính</label>
                                        <input type="text" class="form-control informationshkupdate" id="gioitinhupdate" name="gioitinhupdate" value="<?php echo $rowinfoshk['gioitinh'] ?>" aria-describedby="emailHelp" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Quê quán</label>
                                        <input type="text" class="form-control informationshkupdate" id="nguyenquanupdate" name="nguyenquanupdate" value="<?php echo $rowinfoshk['nguyenquan'] ?>" aria-describedby="emailHelp" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Dân tộc</label>
                                        <input type="text" class="form-control informationshkupdate" id="dantocupdate" name="dantocupdate" value="<?php echo $rowinfoshk['dantoc'] ?>" aria-describedby="emailHelp" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Tôn giáo</label>
                                        <input type="text" class="form-control informationshkupdate" name="tongiaoupdate" value="<?php echo $rowinfoshk['tongiao'] ?>" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Quốc tịch</label>
                                        <input type="text" class="form-control informationshkupdate" id="quoctichupdate" name="quoctichupdate" value="<?php echo $rowinfoshk['quoctich'] ?>" aria-describedby="emailHelp" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Nghề nghiệp </label>
                                        <input type="text" class="form-control informationshkupdate" id="nghenghiepnoilamviecupdate" name="nghenghiepnoilamviecupdate" value="<?php echo $rowinfoshk['nghenghiepnoilamviec'] ?>" aria-describedby="emailHelp" required>
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="col-md-6 mt-3 form-group">
                                        <label for="exampleInputEmail1" class="form-label fw-bold">Nơi thường trú trước đây</label>
                                        <input type="text" class="form-control informationshkupdate" name="noithuongtrutruocdayupdate" value="<?php echo $rowinfoshk['noithuongtrutruocday'] ?>" aria-describedby="emailHelp">
                                        <span class="form-message"></span>
                                    </div>
                                    <div class="mt-3 d-flex justify-content-center">
                                        <button class="btn btn-primary" type="submit" id="smUpdateshk" name="smUpdateshk">Xác Nhận Sửa</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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