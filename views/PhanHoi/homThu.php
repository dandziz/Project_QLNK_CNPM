<?php
if (isset($_SESSION['LoginOK'])) {
    $mang = explode('.', $_SESSION['LoginOK']);
    $sql = "Select* from taikhoan where taikhoan = '{$mang[1]}'";
    $connection = mysqli_connect('localhost', 'root', '', 'db_qlnk');
    $tmp = mysqli_query($connection, $sql);
    $conganxa = mysqli_fetch_assoc($tmp);
    $ma_taikhoan = $conganxa['ma_taikhoan'];
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style/stylesidebar.css">
        <title>Hòm thư</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../../BTL_QLNK/style/style.css">
    </head>

    <body>
        <nav class="sidebar close">
            <header>
                <div class="image-text">

                    </span>

                    <div class="text logo-text">
                        <span class="name text-uppercase">Chào mừng</span>
                        <span class="profession text-uppercase"><?php echo $conganxa['hoten'] ?></span>
                    </div>
                </div>

                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">

                    <!-- <li class="search-box">
                        <i class='bx bx-search icon'></i>
                        <input type="text" placeholder="Search...">
                    </li> -->

                    <ul class="menu-links tabs" style="padding: 0; margin:0">
                        <li class="nav-link tab-item active" style="padding: 0; margin:0">
                            <a href="#">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text text-uppercase">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-link tab-item" style="padding: 0; margin:0">
                            <a href="#">
                                <i class="bi bi-question-circle icon"></i>
                                <span class="text nav-text text-uppercase">Câu Hỏi</span>
                            </a>
                        </li>

                        <li class="nav-link tab-item" style="padding: 0; margin:0">
                            <a href="#">
                                <i class="bi bi-pencil-square icon"></i>
                                <span class="text nav-text text-uppercase">Chuyển Khẩu</span>
                            </a>
                        </li>

                        <li class="nav-link tab-item" style="padding: 0; margin:0">
                            <a href="#">
                                <i class="bi bi-sd-card icon"></i>
                                <span class="text nav-text text-uppercase">Lưu Trữ</span>
                            </a>
                        </li>


                    </ul>
                </div>

                <div class="bottom-content">

                </div>
            </div>

        </nav>

        <section class="home">
            <main>
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
                                            <a href="index.php?controller=DangNhap&action=dangnhap"><button class="btn btn-outline-success" type="button">Đăng nhập</button></a>
                                        <?php
                                        } else {
                                            $mang = explode('.', $_SESSION['LoginOK']);
                                            $sql = "Select* from taikhoan where taikhoan = '{$mang[1]}'";
                                            $connection = mysqli_connect('localhost', 'root', '', 'db_qlnk');
                                            $tmp = mysqli_query($connection, $sql);
                                            $conganxa = mysqli_fetch_assoc($tmp);
                                            $ma_taikhoan = $conganxa['ma_taikhoan'];
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
                <div class="tab-content p-5">
                    <div class="tab-pane active">
                        <div class="mt-2 mb-2">
                            <a href="index.php?controller=CongAnXa&action=index" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                                    arrow_back
                                </span> <span>Quay lại</span> </a>
                        </div>
                        <?php
                        if(isset($_GET['success'])){
                        ?>
                        <h5><?php echo $_GET['success'] ?></h5>
                        <?php
                        }
                        ?>
                        <h3 class="text-uppercase">Dashboard</h3>
                        <div class="row" style="margin-top:150px">
                            <div class="col-md-4 mt-2">
                                <div class="col-md dashboard p-4 text-center border bg-primary rounded">
                                    <h4>SỐ CÂU HỎI <br> ĐANG CHỜ</h4>
                                    <hr style="color: white;">
                                    <h4><?php echo $soCH ?></h4>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="col-md dashboard p-4 text-center border bg-primary rounded">
                                    <h4>SỐ YÊU CẦU CHUYỂN <br> KHẨU ĐANG CHỜ</h4>
                                    <hr style="color: white;">
                                    <h4><?php echo $yCCK ?></h4>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="col-md dashboard p-4 text-center border bg-primary rounded">
                                    <h4>LƯU TRỮ <br> YÊU CẦU</h4>
                                    <hr style="color: white;">
                                    <h4><?php echo $soLuuTru ?></h4>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="col-md dashboard p-4 text-center border bg-primary rounded">
                                    <h4>MÃ CÂU HỎI ĐANG XỬ LÝ</h4>
                                    <hr style="color: white;">
                                    <h4><?php echo $isDangXuLy!=false ? $isDangXuLy : '' ?></h4>
                                </div>
                            </div>
                            <div class="col-md-6 mt-2">
                                <div class="col-md dashboard p-4 text-center border bg-primary rounded">
                                    <h4>MÃ YÊU CẦU CHUYỂN KHẨU ĐANG XỬ LÝ</h4>
                                    <hr style="color: white;">
                                    <h4><?php echo $isDangXuLyCK!=false ? $isDangXuLyCK : '' ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <h3 class="text-uppercase">Câu hỏi</h3>
                        <div class="col-md-4 mt-2 mb-2">
                            <form class="flex-row">
                                <input class="form-control me-2" type="search" id="cauhoi" placeholder="TÌM KIẾM CÂU HỎI" aria-label="Search">
                                <button class="btn btn-primary mt-1" id="searchCH" type="button">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="cauHoiCanGiaiDap">
                            <?php
                            if ($cauHoi != false) {
                                for ($i = 0; $i < count($cauHoi); $i++) {
                                    $row = $cauHoi[$i];
                                    $classCH = $row['ma_cauhoi'];
                                    if($row['trangthai']==0){
                                        $trangthai = "Đang chờ xử lý";
                                    }else if($row['trangthai']==2){
                                        $trangthai = "Đang xử lý";
                                    }
                            ?>
                                    <div class="row border-start border-top border-end mb-4">
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-envelope icon-email"></i>EMAIL: <?php echo $row['email'] ?></span>
                                        </div>
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Mã: <?php echo $row['ma_cauhoi'] ?></span>
                                        </div>
                                        
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Trạng thái: <?php echo $trangthai ?></span>
                                        </div>
                                        
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <?php
                                            $p = $row['lydo'];
                                            $text = substr($p, 0, 100);
                                            $text = $text . ' . . .';
                                            ?>
                                            <h5 class="text-uppercase">Nội dung</h5>
                                            <span><?php echo $text ?></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <h5 class="text-uppercase">Thao tác</h5>
                                            <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="xemchitiet text-decoration-none" role="button"><span class="thaotac"><i class="bi bi-eye"></i> CHI TIẾT</span></a>
                                            <?php
                                                if($trangthai=="Đang xử lý"){
                                            ?>
                                            <a href="index.php?controller=PhanHoi&action=phanhoicauhoi&macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-reply-fill"></i> PHẢN HỒI</span></a>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if($isDangXuLy==false){
                                            ?>
                                            <a href="index.php?controller=PhanHoi&action=chuyentrangthai&macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-toggle-on"></i></i> CHUYỂN TRẠNG THÁI</span></a>
                                            <?php
                                            }
                                            ?>
                                            <a href="index.php?controller=PhanHoi&action=xoacauhoi&macauhoi=<?php echo $row['ma_cauhoi'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa câu hỏi này?')" class="text-decoration-none"><span class="thaotac"><i class="bi bi-trash"></i> XÓA</span></a>
                                        </div>
                                    </div>
                                    <hr>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <h3 class="text-uppercase">Chuyển khẩu</h3>
                        <div class="col-md-4 mt-2 mb-2">
                            <form class="flex-row">
                                <input class="form-control me-2" type="search" id="chuyenkhau" placeholder="TÌM KIẾM YÊU CẦU CHUYỂN KHẨU" aria-label="Search">
                                <button class="btn btn-primary mt-1" id="seachCK" type="button">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="chuyenKhauCanGiaiDap">
                            <?php
                            if ($chuyenKhau != false) {
                                for ($i = 0; $i < count($chuyenKhau); $i++) {
                                    $row = $chuyenKhau[$i];
                                    $classCH = $row['ma_cauhoi'];
                                    if($row['trangthai']==0){
                                        $trangthai = "Đang chờ xử lý";
                                    }else if($row['trangthai']==2){
                                        $trangthai = "Đang xử lý";
                                    }
                            ?>
                                    <div class="row border-start border-top border-end mb-4">
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-envelope icon-email"></i>EMAIL: <?php echo $row['email'] ?></span>
                                        </div>
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Mã: <?php echo $row['ma_cauhoi'] ?></span>
                                        </div>
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Trạng thái: <?php echo $trangthai ?></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <?php
                                            $link = $row['lydo'];
                                            $link = "uploads/" . $link;
                                            ?>
                                            <h5 class="text-uppercase">FILE</h5>
                                            <span><a href="<?php echo $link ?>" class="text-decoration-none">Nhấn vào đây để tải xuống</a></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <h5 class="text-uppercase">Thao tác</h5>
                                            <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="text-decoration-none xemchitiet" role="button"><span class="thaotac"><i class="bi bi-eye"></i> CHI TIẾT</span></a>
                                             <?php
                                                if($trangthai=="Đang xử lý"){
                                            ?>
                                            <a href="index.php?controller=PhanHoi&action=phanhoichuyenkhau&machuyenkhau=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-reply-fill"></i> PHẢN HỒI</span></a>
                                            <?php
                                                }
                                                if($isDangXuLyCK==false){
                                            ?>
                                            <a href="index.php?controller=PhanHoi&action=chuyentrangthai&macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-toggle-on"></i></i> CHUYỂN TRẠNG THÁI</span></a>
                                            <?php
                                            }
                                            ?>
                                            <a href="index.php?controller=PhanHoi&action=xoachuyenkhau&macauhoi=<?php echo $row['ma_cauhoi'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa yêu cầu chuyển khẩu này?')" class="text-decoration-none"><span class="thaotac"><i class="bi bi-trash"></i> XÓA</span></a>
                                        </div>
                                    </div>
                                    <hr>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <h3 class="text-uppercase">Lưu trữ</h3>
                        <div class="col-md-4 mt-2 mb-2">
                            <form class="flex-row">
                                <input class="form-control me-2" type="search" id="luutru" placeholder="TÌM KIẾM CÂU HỎI HOẶC YÊU CẦU CHUYỂN KHẨU" aria-label="Search">
                                <button class="btn btn-primary mt-1" id="searchLuuTru" type="button">Tìm kiếm</button>
                            </form>
                        </div>
                        <div id="luuTruThongTin">
                        <?php
                        if ($luuTru != false) {
                            for ($i = 0; $i < count($luuTru); $i++) {
                                $row = $luuTru[$i];
                                $classCH = $row['ma_cauhoi'];
                                if ($row['loaicauhoi'] == 1) {
                        ?>
                                    <div class="row border-start border-top border-end mb-4">
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-envelope icon-email"></i>EMAIL: <?php echo $row['email'] ?></span>
                                        </div>
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Mã: <?php echo $row['ma_cauhoi'] ?></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <?php
                                            $p = $row['lydo'];
                                            $text = substr($p, 0, 100);
                                            $text = $text . ' . . .';
                                            ?>
                                            <h5 class="text-uppercase">Nội dung</h5>
                                            <span><?php echo $text ?></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <h5 class="text-uppercase">Thao tác</h5>
                                            <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="text-decoration-none xemchitiet" role="button"><span class="thaotac"><i class="bi bi-eye"></i> CHI TIẾT</span></a>
                                            <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="text-decoration-none xemphanhoi" role="button"><span class="thaotac"><i class="bi bi-eye"></i> XEM PHẢN HỒI</span></a>
                                        </div>
                                    </div>
                                    <hr>
                                <?php
                                } else {
                                ?>
                                    <div class="row border-start border-top border-end mb-4">
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-envelope icon-email"></i>EMAIL: <?php echo $row['email'] ?></span>
                                        </div>
                                        <div class="col-md-12 mt-1 mb-1 cauhoi p-2">
                                            <span class="text-uppercase"><i class="bi bi-code-slash icon-email"></i>Mã: <?php echo $row['ma_cauhoi'] ?></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <?php
                                            $link = $row['lydo'];
                                            $link = "uploads/" . $link;
                                            ?>
                                            <h5 class="text-uppercase">FILE</h5>
                                            <span><a href="<?php echo $link ?>" class="text-decoration-none">Nhấn vào đây để tải xuống</a></span>
                                        </div>
                                        <div class="col-md-12 mb-1 cauhoi p-2">
                                            <h5 class="text-uppercase">Thao tác</h5>
                                            <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="text-decoration-none xemchitiet" role="button"><span class="thaotac"><i class="bi bi-eye"></i> CHI TIẾT</span></a>
                                            <a data-bs-toggle="modal" id="<?php echo $classCH ?>" data-bs-target="#exampleModal" class="text-decoration-none xemphanhoi" role="button"><span class="thaotac"><i class="bi bi-eye"></i> XEM PHẢN HỒI</span></a>
                                        </div>
                                    </div>
                                    <hr>
                        <?php
                                }
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </main>
        </section>

        <!-- Modal -->
        <div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Thông tin chi tiết</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="infoquestion">
                                <div class="row">
                                    <div class="col-md-12 chitet d-flex justify-content-between mb-3">
                                        <span class="fw-bold fs-5">Mã câu hỏi: </span><span class="fs-5"><?php echo isset($ma_cauhoi) ? $ma_cauhoi : '' ?></span>
                                    </div>
                                    <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                                        <span class="fw-bold fs-5">Họ và tên: </span><span class="fs-5"><?php echo isset($hoten) ? $hoten : '' ?></span>
                                    </div>
                                    <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                                        <span class="fw-bold fs-5">Email: </span><span class="fs-5"><?php echo isset($email) ? $email : '' ?></span>
                                    </div>
                                    <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                                        <span class="fw-bold fs-5">Số điện thoại: </span><span class="fs-5"><?php echo isset($sdt) ? $sdt : '' ?></span>
                                    </div>
                                    <div class="col-md-12 chitet mb-3">
                                        <span class="fw-bold fs-5">Lý do gửi câu hỏi: </span><span class="fs-5"><?php echo isset($lydo) ? $lydo : '' ?></span>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between mb-3">
                                        <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $ngayhoi : '' ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <footer class="body-footer">
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
        </footer> -->
        </section>
        <script>
            const $$$ = document.querySelector.bind(document);
            const $$ = document.querySelectorAll.bind(document);
            const tabs = $$(".tab-item");
            const panes = $$(".tab-pane");
            const tabActive = $$$(".tab-item.active");
            const line = $$$(".tabs .line");
            tabs.forEach((tab, index) => {
                const pane = panes[index];

                tab.onclick = function() {
                    $$$(".tab-item.active").classList.remove("active");
                    $$$(".tab-pane.active").classList.remove("active");
                    this.classList.add("active");
                    pane.classList.add("active");
                };
            });
        </script>
        <script>
            const body = document.querySelector('body'),
                sidebar = body.querySelector('nav'),
                toggle = body.querySelector(".toggle"),
                searchBtn = body.querySelector(".search-box"),
                modeSwitch = body.querySelector(".toggle-switch"),
                modeText = body.querySelector(".mode-text");


            toggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="js/jquery-3.6.0.min.js"></script>
        <script src="js/script.js"></script>
        <script src="js/scriptHome.js"></script>
    </body>

    </html>

    <<?php

    } else {
        header("location: index.php");
    }
        ?>