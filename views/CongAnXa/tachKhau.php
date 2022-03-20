<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
?>
    <head>
        <title>Tách khẩu</title>
    </head>
    <main style="background-color: #fafafa;" class="container rounded">
        <div class="col-md-2">
            <a href="index.php?controller=CongAnXa&action=index" class="text-decoration-none btn btn-primary"><i class="bi bi-arrow-left"></i> Quay Lại</a>
        </div>
        <div class="container pt-2  ms-3 me-3">
            <h4 class="text-center">TÁCH KHẨU</h4>
            <?php
            if (!isset($_GET['cccd'])) {
            ?>
                <div class="row">
                    <div class="col-md-8 ms-auto me-auto bg-white rounded shadow-sm p-2">
                        <h5>Tìm kiếm sổ hộ khẩu chứa người dân muốn tách</h5>
                        <div class="col-md-6 mt-2">
                            <form class="flex-row">
                                <input class="form-control me-2" type="search" id="mashkTk" placeholder="Nhập mã sổ hộ khẩu" aria-label="Search">
                                <button class="btn btn-success mt-1" id="searchShkTk" type="button">Tìm kiếm</button>
                            </form>
                            <form class="flex-row mt-2" id="selectND">

                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" id="formthongtin">

                </div>
            <?php
            } else {
            ?>
                <div class="row">
                    <div class="col-md-8 ms-auto me-auto bg-white rounded shadow-sm p-2">

                    </div>
                </div>
                <div class="row" id="formthongtin">
                <?php
                include("tmp-tachkhau.php");
            }
                ?>
                </div>
        </div>
    </main>
<?php
    require("views/partials-front/footer.php");
} else {
    header("location: index.php");
}
?>