<?php
require "./partials-front/header.php";
?>
<main style="padding-bottom: 100px;" id="body-index">
    <div class="container">
        <div class="pt-3">
            <h2 class="text-title">Trang Thông Tin Nhân Khẩu Của Xã</h2>
            <h2 class="text-title">X</h2>
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
                <form action="shkinformation.php" method="POST">
                    <div class="d-grid gap-2">
                        <h4 class="text-title">Tra Cứu Thông Tin Sổ Hộ Khẩu</h4>
                        <input class="form-control me-2" type="search" placeholder="Nhập mã sổ hộ khẩu" aria-label="Search">
                        <button class="btn btn-primary ms-auto me-auto" type="submit">Tra Cứu</button>
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
            <div class="col-md-3 ms-auto me-auto mb-2">
                <a href="#" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Thủ Tục Tạm Trú</h5>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ms-auto me-auto mb-2">
                <a href="#" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Thủ Tục Tạm Vắng</h5>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ms-auto me-auto mb-2">
                <a href="#" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Thủ Tục Chuyển Khẩu</h5>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-3 ms-auto me-auto mb-2">
                <a href="#" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Tải Xuống Bản Đăng Ký</h5>
                        </span>
                    </div>
                </a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8 ms-auto me-auto mb-2">
                <a href="#" class="text-decoration-none">
                    <div class="d-grid gap-2">
                        <span style="height: 40px;" class="btn btn-light shadow-sm nav-features" type="button">
                            <h5 class="fw-bold text-secondary">Gửi Câu Hỏi</h5>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>
<?php
require "./partials-front/footer.php";
?>