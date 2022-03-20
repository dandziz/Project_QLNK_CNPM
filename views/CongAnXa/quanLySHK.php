<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
    $result = $m->getALL($ma_shk, "ma_shk", "sohokhau");
    if ($result != false) {
        $row = $result[0];
        $resultct = $m->getALL($ma_shk, "ma_shk", "thanhvienshk");
?>
<head>
<title>Quản lý sổ hộ khẩu</title>
</head>
        <main style="background-color: #fafafa;">
            <div class="container mt-3 mb-5">
                <div class="row">
                    <div class="col-md-3" id="sidebar-info">
                        <div class="list-group bg-white shadow-sm p-2">
                            <h4>Danh sách nhân khẩu trong sổ hộ khẩu</h4>
                            <a href="#home" class="list-group-item list-group-item-action active" aria-current="true">
                                Trang chính
                            </a>
                            <a href="#chuho" class="list-group-item list-group-item-action">Chủ hộ</a>
                            <?php
                            for ($i = 0; $i < count($resultct); $i++) {
                                $ngdan = $resultct[$i];
                                if ($ngdan['chuho'] != 1) {
                            ?>
                                    <a href="#<?php echo $ngdan['cccd'] ?>" class="list-group-item list-group-item-action"><?php echo $ngdan['hoten'] ?></a>
                            <?php
                                } else {
                                    continue;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-8 pt-2 ms-auto">
                        <?php
                        if (isset($_GET['done'])) {
                            echo "<p style='color:blue'>{$_GET['done']}</p>";
                        }
                        ?>
                        <div class="col-md-2">
                            <a href="index.php?controller=CongAnXa&action=index" class="text-decoration-none btn btn-primary mb-2"><i class="bi bi-arrow-left"></i> Quay Lại</a>
                        </div>
                        <button type="button" class="btn btn-primary me-2 mb-2" data-toggle="modal" data-target="#exampleModal">
                            <a href="index.php?controller=CongAnXa&action=themthanhvien&mashk=<?php echo $ma_shk ?>" class="text-white text-decoration-none">Thêm thành viên</a><br>
                        </button>
                        <button type="button" class="btn btn-primary me-2 mb-2" data-toggle="modal" data-target="#exampleModal">
                            <a href="index.php?controller=CongAnXa&action=doichuho&mashk=<?php echo $ma_shk ?>" class="text-white text-decoration-none">Đổi chủ hộ</a><br>
                        </button>
                        <div id="home" style="color:white" class="bg-danger shadow-sm p-2">
                            <h5 class="text-center">Công An Thành Phố <?php echo $row['thanhpho'] ?></h5>
                            <h4 class="text-center">SỔ HỘ KHẨU</h4>
                            <h5 class="text-center">SỐ: <?php echo $row['ma_shk'] ?></h5>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Họ và tên chủ hộ: </span><span class="fs-5"><?php echo $row['hotenchuho'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Nơi thường trú: </span><span class="fs-5"><?php echo $row['noithuongtru'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Ngày cấp: </span><span class="fs-4"><?php echo $m->getDate($row['ngaycap']) ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <?php
                                $cb = $m->getONE($row['ma_taikhoan'], "ma_taikhoan", "taikhoan");
                                ?>
                                <span class="fw-bold fs-6"><?php echo $cb['chucvu'] ?>: </span><span class="fs-5"><?php echo $cb['hoten'] ?></span>
                            </div>
                        </div>
                        <?php
                        for ($i = 0; $i < count($resultct); $i++) {
                            $ch = $resultct[$i];
                            if ($ch['chuho'] == true) {
                                break;
                            }
                        }
                        ?>
                        <div id="chuho" class="mt-2 bg-white shadow-sm p-2">
                            <h4 class="text-center">CHỦ HỘ</h4>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Họ và tên: </span><span class="fs-4"><?php echo $ch['hoten'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Họ và tên gọi khác(nếu có):</span><span class="fs-4"><?php echo $ch['hotenkhac'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Ngày, tháng, năm sinh: </span><span class="fs-4"><?php echo $m->getDate($ch['ngaysinh']) ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Giới tính: </span><span class="fs-4"><?php echo $ch['gioitinh'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Quê quán: </span><span class="fs-4"><?php echo $ch['nguyenquan'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Dân tộc: </span><span class="fs-4"><?php echo $ch['dantoc'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Tôn giáo: </span><span class="fs-4"><?php echo $ch['tongiao'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Quốc tịch: </span><span class="fs-4"><?php echo $ch['quoctich'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">CCCD số: </span><span class="fs-4"><?php echo $ch['cccd'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <span class="fw-bold fs-6">Nghề nghiệp, nơi làm việc: </span><span class="fs-4"><?php echo $ch['nghenghiepnoilamviec'] ?></span>
                            </div>
                            <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                <?php
                                $cb = $m->getONE($ch['ma_taikhoan'], "ma_taikhoan", "taikhoan");
                                ?>
                                <span class="fw-bold fs-6">Cán bộ đăng ký: </span><span class="fs-4"><?php echo $cb['hoten'] ?></span>
                            </div>
                            <div class="d-flex mt-3 mb-3 justify-content-center">
                                <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModal">
                                    <a href="index.php?controller=CongAnXa&action=suathongtin&cccd=<?php echo $ch['cccd'] ?>" class="text-white text-decoration-none">Sửa thông tin</a><br>
                                </button>
                            </div>
                        </div>
                        <?php
                        for ($i = 0; $i < count($resultct); $i++) {
                            $ngdan = $resultct[$i];
                            if ($ngdan['chuho'] != 1) {
                        ?>
                                <div id="<?php echo $ngdan['cccd'] ?>" class="mt-2 bg-white shadow-sm p-2">
                                    <h4 class="text-center">QUAN HỆ VỚI CHỦ HỘ: <?php echo $ngdan['quanhech'] ?></h4>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Họ và tên: </span><span class="fs-4"><?php echo $ngdan['hoten'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Họ và tên gọi khác(nếu có):</span><span class="fs-4"><?php echo $ngdan['hotenkhac'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Ngày, tháng, năm sinh: </span><span class="fs-4"><?php echo $m->getDate($ngdan['ngaysinh']) ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Giới tính: </span><span class="fs-4"><?php echo $ngdan['gioitinh'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Quê quán: </span><span class="fs-4"><?php echo $ngdan['nguyenquan'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Dân tộc: </span><span class="fs-4"><?php echo $ngdan['dantoc'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Tôn giáo: </span><span class="fs-4"><?php echo $ngdan['tongiao'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Quốc tịch: </span><span class="fs-4"><?php echo $ngdan['quoctich'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">CCCD số: </span><span class="fs-4"><?php echo $ngdan['cccd'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <span class="fw-bold fs-6">Nghề nghiệp, nơi làm việc: </span><span class="fs-4"><?php echo $ngdan['nghenghiepnoilamviec'] ?></span>
                                    </div>
                                    <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
                                        <?php
                                        $cb = $m->getONE($ch['ma_taikhoan'], "ma_taikhoan", "taikhoan");
                                        ?>
                                        <span class="fw-bold fs-6">Cán bộ đăng ký: </span><span class="fs-4"><?php echo $cb['hoten'] ?></span>
                                    </div>
                                    <div class="d-flex mt-3 mb-3 justify-content-center">
                                        <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModal">
                                            <a href="index.php?controller=CongAnXa&action=suathongtin&cccd=<?php echo $ngdan['cccd'] ?>" class="text-white text-decoration-none">Sửa thông tin</a><br>
                                        </button>
                                        <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModal">
                                            <a onclick="return confirm('Bạn chắc chắn muốn gỡ người này khỏi hộ khẩu?')" href="index.php?controller=CongAnXa&action=gothanhvien&mashk=<?php echo $ngdan['ma_shk'] ?>&cccd=<?php echo $ngdan['cccd'] ?>" class="text-white text-decoration-none">Gỡ người dân</a><br>
                                        </button>
                                        <button type="button" class="btn btn-primary me-2" data-toggle="modal" data-target="#exampleModal">
                                            <a href="index.php?controller=CongAnXa&action=chuyenkhau&cccd=<?php echo $ngdan['cccd'] ?>" class="text-white text-decoration-none">Chuyển khẩu</a><br>
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            <a href="index.php?controller=CongAnXa&action=tachkhau&mashk=<?php echo $ngdan['ma_shk'] ?>&cccd=<?php echo $ngdan['cccd'] ?>" class="text-white text-decoration-none">Tách khẩu</a><br>
                                        </button>
                                    </div>
                                </div>
                        <?php
                            } else {
                                continue;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
<?php
    }
}
?>