<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../BTL_QLNK/style/style.css">
</head>

<body>
    <header style="background-color: #1C8233;">
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
                            if(!isset($_SESSION['LoginOK'])){
                            ?>
                            <a href="index.php?controller=DangNhap&action=dangnhap"><button class="btn btn-outline-success" type="button">Đăng nhập</button></a>
                            <?php
                            }else{
                            ?>
                            <a href="index.php?controller=CongAnXa&action=index"><button class="btn btn-outline-success me-2" type="button">Quản Lý</button></a>
                            <a href="index.php?controller=DangNhap&action=dangxuat"><button class="btn btn-outline-success" type="button">Đăng xuất</button></a>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
<head>
    <title>Trang chủ</title>
</head>
<main style="padding-bottom: 100px;" id="body-index">
    <div class="container">
        <div class="pt-3">
            <h2 class="heading text-title">Trang Thông Tin Nhân Khẩu Của Xã</h2>
            <h2 class="heading text-title">Phú Yên</h2>
        </div>
        <div class="row">
            <div class="col-md-4 ms-auto me-auto">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/carousel/1.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/carousel/1.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/carousel/1.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-5 ms-auto me-auto">
                <form action="index.php?controller=SoHoKhau&action=timkiemsohokhau" method="POST">
                    <div class="d-grid gap-2">
                        <h4 class="text-title">Tra Cứu Thông Tin Sổ Hộ Khẩu</h4>
                        <input class="form-control me-2" type="search" placeholder="Nhập mã sổ hộ khẩu" name="mashk" aria-label="Search">
                        <button class="btn btn-primary ms-auto me-auto" name="tracuu" type="submit">Tra Cứu</button>
                    </div>
                </form>
                <hr style="color: white;">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-6 ms-auto me-auto">
                <marquee style="width:100%" direction="left"><span class="text-white fw-bold fs-5 text-center">Chọn chức năng dưới đây để thực hiện làm thủ tục trực tuyến</span></marquee>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 ms-auto me-auto mb-2">
                <a href="index.php?controller=ThuTuc&action=thutuctamtru" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Thủ Tục Tạm Trú</h5>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 ms-auto me-auto mb-2">
                <a href="index.php?controller=ThuTuc&action=thutuctamvang" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Thủ Tục Tạm Vắng</h5>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-4 ms-auto me-auto mb-2">
                <a href="index.php?controller=CauHoi&action=guicauhoi" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Gửi Câu Hỏi</h5>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-2">
            
            <div class="col-md-6 ms-auto me-auto mb-2">
                <a href="index.php?controller=CauHoi&action=thutucchuyenkhau" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Thủ Tục Chuyển Khẩu</h5>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-6 ms-auto me-auto mb-2">
                <a href="index.php?controller=ThuTuc&action=taixuong" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Tải Xuống Bản Đăng Ký</h5>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
<footer class="body-footer">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-around" style="height: 30px;">
                <div>
                    <span class="fs-6">&copy; <span class="fs-6 text-center">Bản quyền thuộc công an xã ...</span></span>
                </div>
                <div>
                    <span class="fs-6"><span class="fs-6 text-center">Hotline: 0366887398</span></span>
                </div>
                <div>
                    <span class="fs-6"><span class="fs-6 text-center">Email: Daodan2612@gmail.com</span></span>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scriptHome.js"></script>
</body>
</html>