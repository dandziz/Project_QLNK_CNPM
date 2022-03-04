<?php
session_start();
require "config/config.php";
require('partials-front/header.php');
require_once "../classprocessSQL.php";
require_once "../process-string.php";
$ps = new Process();
if (isset($_SESSION['LoginOK'])) {
    header('location: ../index.php');
} else {
    if (isset($_POST['btnaddshk'])) {
        require('partials-front/header.php');
        $sqlstatusshk = "Select* from tb_chitietshk where  tb_chitietshk.ma_shk = '{$ma_shk}'";
        $resultstatusshk =  mysqli_query($conn, $sqlstatusshk);
        if (mysqli_num_rows($resultstatusshk) > 0) {
            $row = mysqli_fetch_assoc($resultstatusshk);
        }
        $cccd = $_POST['cccd'];
        $canbodangky = $_POST['canbodangky'];
        $truongcongan = $_POST['truongcongan'];
        $hoten = $_POST['hoten'];
        $hotenkhac = $_POST['hotenkhac'];
        $quanhech = $_POST['quanhech'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $nguyenquan = $_POST['nguyenquan'];
        $dantoc = $_POST['dantoc'];
        $tongiao = $_POST['tongiao'];
        $quoctich = $_POST['quoctich'];
        $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviec'];
        $noithuongtrutruocday = $_POST['noithuongtrutruocday'];
        $sqladdshk = "Insert into tb_chitietshk Values('{$cccd}','{$hoten}',{$hotenkhac},{$quanhech}, '{$ngaysinh}', {$gioitinh} ,'{$nguyenquan}','{$dantoc}','{$tongiao}', '{$quoctich}','{$nghenghiepnoilamviec}',
        '{$noithuongtrutruocday}'0, 0, {$_POST['canbodangky']}, {$row['ma_chucvu']})";
        if (mysqli_query($conn, $sqladdshk)) {
            header("location: index.php");
        } else {
            header("location: index.php");
        }

        $sqlstatusshk = "Select* from tb_chitietshk, tb_nguoidung where tb_nguoidung.taikhoan = '{$taikhoan}' and ma_shk = '{$ma_shk}'";
        $resultstatusshk =  mysqli_query($conn, $sqlstatusshk);
        if (mysqli_num_rows($resultstatusshk) > 0) {
            $row = mysqli_fetch_assoc($resultstatusshk);
        }
    
    } else if (isset($_POST['themthongtinshk']) && $ps->checkshk($_POST['themthongtinshk']) || isset($_GET['ma_shk']) && $ps->checkshk($_GET['ma_shk'])) {
        if (isset($_POST['themthongtinshk'])) {
            $ma_shk = $_POST['ma_shk_update'];
        } else {
            $ma_shk = $_GET['ma_shk'];
        }
        $sqlinfoshk = "Select* from tb_chitietshk where ma_shk = '{$ma_shk}' ";
        $resultinfoshk =  mysqli_query($conn, $sqlinfoshk);
        $rowinfoshk = mysqli_fetch_assoc($resultinfoshk);
    } else {
        header("location: index.php");
    }
?>

<body class="bg-light">
    
    <main style="background-color: #fafafa;">
        <div class="container mt-3 mb-5">
        <div class="mt-2 mb-2">
            <a href="manage/index.php" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                    arrow_back
                </span> <span>Quay lại</span> </a>
        </div>
            <div class="row">
                <div class="col-md-3" id="sidebar-info">
                    <div class="list-group bg-white shadow-sm p-2">
                        <h4>Danh sách nhân khẩu trong sổ hộ khẩu</h4>
                        <a href="#home" class="list-group-item list-group-item-action active" aria-current="true">
                            Trang chính
                        </a>
                        <a href="#chuho" class="list-group-item list-group-item-action">Chủ hộ</a>
                        <a href="#2" class="list-group-item list-group-item-action">Nguyễn Thị F</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                    </div>
                </div>
                <div class="col-md-8 pt-2 ms-auto">
                    <div id="home" style="color:white" class="bg-danger shadow-sm p-2">
                        <h5 class="text-center">Công An Thành Phố <?php echo $rowinfoshk['thanhpho'] ?> </h5>
                        <h4 class="text-center">SỔ HỘ KHẨU</h4>
                        <h5 class="text-center">SỐ: <?php echo $ma_shk ?> </h5>
                        <input type="text" readonly style="display: none;" id="shkcodemainde" value="<?php echo $ma_shk ?>">
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Họ và tên chủ hộ: </span><span class="fs-5">Đào Văn A</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Nơi thường trú: </span><span class="fs-5">PX-PY-HN</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Ngày cấp: </span><span class="fs-4">Ngày 27, Tháng 02, Năm 2008</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">TRƯỞNG CÔNG AN XÃ: </span><span class="fs-5">Vũ Đại C</span>
                        </div>
                    </div>
                    <div id="chuho" class="mt-2 bg-white shadow-sm p-2">
                        <h4 class="text-center">CHỦ HỘ</h4>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Họ và tên: </span><span class="fs-4">Đào Văn A</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Họ và tên gọi khác(nếu có):</span><span class="fs-4"></span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Ngày, tháng, năm sinh: </span><span class="fs-4">1/1/1999</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Giới tính: </span><span class="fs-4">Nam</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Quê quán: </span><span class="fs-4">Phú Yên - Phú Xuyên - Hà Nội</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Dân tộc: </span><span class="fs-4">Kinh</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Tôn giáo: </span><span class="fs-4">Không</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">CCCD số: </span><span class="fs-4">001201023000</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Hộ chiếu số: </span><span class="fs-4">A</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Nghề nghiệp, nơi làm việc: </span><span class="fs-4">Nông dân</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Cán bộ đăng ký: </span><span class="fs-4">Nguyễn Văn D</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Trưởng công an H: </span><span class="fs-4">Vũ Đại C</span>
                        </div>
                        <div class="d-flex mt-3 mb-3 justify-content-center">
                            <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModal">
                            <a href="manage/index.php" class="text-white text-decoration-none">Sửa thông tin</a><br>
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <a href="process-addtour.php?tourcode=<?php echo $tour_code ?>" class="text-white text-decoration-none">Chuyển khẩu</a><br>
                        </button>
                        </div>
                    </div>
                    <div id="2" class="mt-2 bg-white shadow-sm p-2">
                        <h4 class="text-center">QUAN HỆ VỚI CHỦ HỘ: Vợ</h4>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Họ và tên: </span><span class="fs-4">Nguyễn Thị F</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Họ và tên gọi khác(nếu có):</span><span class="fs-4"></span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Ngày, tháng, năm sinh: </span><span class="fs-4">1/1/2000</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Giới tính: </span><span class="fs-4">Nữ</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Quê quán: </span><span class="fs-4">Phú Yên - Phú Xuyên - Hà Nội</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Dân tộc: </span><span class="fs-4">Kinh</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Tôn giáo: </span><span class="fs-4">Không</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">CCCD số: </span><span class="fs-4">001201023001</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Hộ chiếu số: </span><span class="fs-4">A</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Nghề nghiệp, nơi làm việc: </span><span class="fs-4">Nông dân</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Cán bộ đăng ký: </span><span class="fs-4">Nguyễn Văn D</span>
                        </div>
                        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                            <span class="fw-bold fs-6">Trưởng công an H: </span><span class="fs-4">Vũ Đại C</span>
                        </div>
                        <div class="d-flex mt-3 mb-3 justify-content-center">
                            <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModal">
                            <a href="manage/process-shk.php" class="text-white text-decoration-none">Sửa thông tin</a><br>
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <a href="process-shk.php?cccd=<?php echo $cccd ?>" class="text-white text-decoration-none">Chuyển khẩu</a><br>
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    
    require "./partials-front/footer.php";}
    ?>