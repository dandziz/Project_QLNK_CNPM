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
                <h4>Sửa thông tin người quản lý</h4>
                <form class="row g-3 needs-validation" method="post" action="" novalidate>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">Tên người quản lý</label>
                        <input type="text" class="form-control" name="hoten" id="validationCustom01" value="<?php echo isset($_POST['hoten']) ? $_POST['hoten'] : $BD['hoten']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Tài khoản</label>
                        <input type="text" class="form-control" name="taikhoan" id="validationCustom02" value="<?php echo isset($_POST['taikhoan']) ? $_POST['taikhoan'] : $BD['taikhoan']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Mật khẩu</label>
                        <input type="text" class="form-control" name="matkhau" id="validationCustom02" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Chức vụ</label>
                        <input type="text" class="form-control" name="chucvu" id="validationCustom02" value="<?php echo isset($_POST['chucvu']) ? $_POST['chucvu'] : $BD['chucvu']?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Còn làm việc</label>
                        <select class="form-select" name="conlamviec" aria-label="Default select example">
                            <?php
                                $check = isset($_POST['conlamviec']) ? $_POST['conlamviec'] : $BD['conlamviec'];
                                if($check = 1){
                            ?>
                            <option value="1" selected>Còn</option>
                            <option value="0">Không</option>
                            <?php
                                }else{
                                    ?>
                                    <option value="1">Còn</option>
                                    <option value="0" selected>Không</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                        
                    <div class="col-12">
                        <button class="btn btn-primary" name="submit" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>