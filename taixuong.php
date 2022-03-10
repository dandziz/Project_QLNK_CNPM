<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tải xuống thủ tục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/formKhaibao.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Trang chủ</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        </ul>
                        <form class="d-flex">
                            <?php
                            if (!isset($_SESSION['LoginOK'])) {
                            ?>
                                <a href="login.php"><button class="btn btn-outline-success" type="button">Đăng nhập</button></a>
                            <?php
                            } else {
                            ?>
                                <a href="manage/index.php"><button class="btn btn-outline-success me-2" type="button">Quản Lý</button></a>
                                <a href="logout.php"><button class="btn btn-outline-success" type="button">Đăng xuất</button></a>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container rounded" style="background-color: #fafafa; min-height:662px">
            <div class="row">
            <a href="index.php" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
                <div class="col-md-8 ms-auto me-auto mb-5">
                    <h4 class="text-center mt-3">TRA CỨU THÔNG TIN THỦ TỤC VÀ TẢI XUỐNG</h4>
                    <form class="flex-row mt-5">
                        <label for="validationCustom02" class="form-label">Nhập mã thủ tục để tìm kiếm</label>
                        <input class="form-control me-2" type="search" id="madon" placeholder="" aria-label="Search">
                        <button class="btn btn-success mt-1" id="searchTT" type="button">Tìm kiếm</button>
                    </form>
                    <div id="info-thutuc">

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require("partials-front/footer.php")
    ?>