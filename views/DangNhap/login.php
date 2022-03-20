<?php
require "views/partials-front/header.php";
if (!isset($_SESSION['LoginOK'])) {
?>
<head>
    <title>Đăng nhập</title>
</head>
    <main style="padding: 150px;" id="body-index">
        <div class="col-md-5 ms-auto me-auto bg-white rounded p-3">
            <div class="mt-2 mb-2">
                <a href="index.php" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
            </div>
            <div>
                <h3 class="text-center">Đăng nhập</h3>
            </div>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tài Khoản</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="taikhoan">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Remember me</label>
                </div>
                <div class="d-grid gap-2 mb-4">
                    <button class="btn btn-primary rounded-pill" type="submit" name="btnsignin">Đăng nhập</button>
                </div>
                <?php
                if (isset($_GET['error'])) {
                    echo "<p style='color: red'>{$_GET['error']}</p>";
                }
                ?>
            </form>
        </div>
        </div>
    </main>
<?php
    require "views/partials-front/footer.php";
} else {
    header("location: index.php?controller=CongAnXa&action=index");
}
?>