<?php
if (isset($_SESSION['LoginAdmin'])) {
    require_once('views/template/header.php');
?>
    <main>
        <div class="container mt-3">
            <div class="row">
                <div style="color: red">
                    <?php echo $error; ?>
                </div>
                <div class="col-md-8 ms-auto me-auto">
                    <div class="row mt-2 mb-2">
                        <div class="col-md-2">
                        <a href="index.php?controller=Admin&action=admin" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                                arrow_back
                            </span> <span>Quay lại</span> </a>
                            </div>
                    </div>
                    <h3 class="text-uppercase text-center">Thêm công an xã</h3>
                    <h4 class="text-uppercase text-center">Nhập thông tin cho công an xã</h4>
                    <form class="row g-3 needs-validation" method="post" action="" novalidate>
                        <div class="col-md-12">
                            <label for="validationCustom01" class="form-label">Tên công an xã</label>
                            <input type="text" class="form-control" name="hoten" id="validationCustom01" value="" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tài Khoản</label>
                            <input type="text" class="form-control" name="taikhoan" id="validationCustom02" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Mật khẩu</label>
                            <input type="text" class="form-control" name="matkhau" id="validationCustom02" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Chức vụ</label>
                            <input type="text" class="form-control" name="chucvu" id="validationCustom02" value="" required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php
}
require_once('views/template/footer.php');
?>