<?php
require 'view/template/header.php'
?>
<main>
    <div class="container">
        <div class="row">
            <div style="color: red">
                <?php echo $error; ?>
            </div>
            <div class="col-md-8 ms-auto me-auto">
                <h4>Nhập thông tin người quản lý</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Tên người quản lý</label>
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
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Còn làm việc</label>
                        <input type="text" class="form-control" name="conlamviec" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>