<?php
session_start();
require_once 'models/PhanHoiModel.php';
require_once 'models/Model.php';
require_once("send_email.php");
if (isset($_SESSION['LoginOK'])) {
    class PhanHoiController
    {
        //hàm xử lý chức năng trang chính hòm thư
        function homthu()
        {
            $model = new PhanHoiModel();
            $soCH = $model->soCH();
            $yCCK = $model->soYCCK();
            $soLuuTru = $model->toTal();
            $cauHoi = $model->getCauHoi();
            $isDangXuLy = $model->getCauHoiDangXuLy();
            $isDangXuLyCK = $model->getChuyenKhauDangXuLy();
            $chuyenKhau = $model->getChuyenKhau();
            $luuTru = $model->getLuuTru();
            require_once 'views/PhanHoi/homThu.php';
        }
        //hàm xử lý chức năng chuyển trạng thái cho câu hỏi hoặc yêu cầu chuyển khẩu
        function chuyentrangthai()
        {
            $model = new PhanHoiModel();
            if (isset($_GET['macauhoi'])) {
                if ($model->chuyenTrangThaiXuLy($_GET['macauhoi'])) {
                    header("location: index.php?controller=PhanHoi&action=homthu");
                } else {
                    header("location: index.php?controller=PhanHoi&action=homthu");
                }
            }
        }
        //hàm xử lý chức năng xem chi tiết của câu hỏi or yêu cầu chuyển khẩu
        function xemchitiet()
        {
            $model = new PhanHoiModel();
            if (isset($_POST['ma_cauhoi'])) {
                $m = new Model();
                $ma_cauhoi = $_POST['ma_cauhoi'];
                $cauHoi = $m->getONE($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
                $hoten = $cauHoi['hoten'];
                $email = $cauHoi['email'];
                $sdt = $cauHoi['sdt'];
                $lydo = $cauHoi['lydo'];
                $ngayhoi = $cauHoi['ngayhoi'];
                $trangthai = $cauHoi['trangthai'];
                $loaicauhoi = $cauHoi['loaicauhoi'];
                if ($trangthai == 0) {
                    $tt = "Đang chờ xử lý";
                } else if ($trangthai == 2) {
                    $tt = "Đang xử lý";
                } else {
                    $tt = "Hoàn tất";
                }
                if ($loaicauhoi == 1) {
?>
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
                        <div class="col-md-12 chitet d-flex justify-content-between mb-3">
                            <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $m->getDate($ngayhoi) : '' ?></span>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between mb-3">
                            <span class="fw-bold fs-5">Trạng thái: </span><span class="fs-5"><?php echo isset($tt) ? $tt : '' ?></span>
                        </div>
                    </div>
                <?php
                } else {
                    $link = "uploads/" . $lydo;
                ?>
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
                            <span class="fw-bold fs-5">File yêu cầu chuyển khẩu: </span><a class="text-decoration-none fs-5" href="<?php echo $link ?>">Nhấn vào đây để tải xuống!</a>
                        </div>
                        <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                            <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $m->getDate($ngayhoi) : '' ?></span>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between mb-3">
                            <span class="fw-bold fs-5">Trạng thái: </span><span class="fs-5"><?php echo isset($tt) ? $tt : '' ?></span>
                        </div>
                    </div>
                <?php
                }
            }
        }
        //hàm xử lý chức năng xem chi tiết phản hồi
        function xemchitietphanhoi()
        {
            $model = new PhanHoiModel();
            if (isset($_POST['ma_cauhoi'])) {
                $m = new Model();
                $ma_cauhoi = $_POST['ma_cauhoi'];
                $cauHoi = $m->getONE($ma_cauhoi, 'ma_cauhoi', 'phanhoi');
                $sql = "Select* from phanhoi where ma_cauhoi = '$ma_cauhoi'";
                $ma_phanhoi = $cauHoi['ma_phanhoi'];
                $phanhoi = $cauHoi['phanhoi'];
                $ngayphanhoi = $cauHoi['ngayphanhoi'];
                $ngayphanhoi = $cauHoi['ngayphanhoi'];
                $taikhoan = $m->getONE($cauHoi['ma_taikhoan'], 'ma_taikhoan', 'taikhoan');
                $canbopheduyet = $taikhoan['hoten'];
                ?>
                <div class="row">
                    <div class="col-md-12 chitet d-flex justify-content-between mb-3">
                        <span class="fw-bold fs-5">Mã phản hồi: </span><span class="fs-5"><?php echo isset($ma_phanhoi) ? $ma_phanhoi : '' ?></span>
                    </div>
                    <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                        <span class="fw-bold fs-5">Mã câu hỏi: </span><span class="fs-5"><?php echo isset($ma_cauhoi) ? $ma_cauhoi : '' ?></span>
                    </div>
                    <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                        <span class="fw-bold fs-5">Ngày phản hồi: </span><span class="fs-5"><?php echo isset($ngayphanhoi) ? $m->getDate($ngayphanhoi) : '' ?></span>
                    </div>
                    <div class="col-md-12 d-flex chitet justify-content-between mb-3">
                        <span class="fw-bold fs-5">Cán bộ phản hồi: </span><span class="fs-5"><?php echo isset($canbopheduyet) ? $canbopheduyet : '' ?></span>
                    </div>
                    <div class="col-md-12 chitet mb-3">
                        <span class="fw-bold fs-5">Phản hồi: </span><span class="fs-5"><?php echo isset($phanhoi) ? $phanhoi : '' ?></span>
                    </div>
                </div>
                <?php
            }
        }
        //hàm xử lý chức năng tìm kiếm câu hỏi
        function timkiemcauhoi()
        {
            $model = new PhanHoiModel();
            if (isset($_POST['cauhoi'])) {
                $cauHoi = $_POST['cauhoi'];
                $result = $model->searchCH($cauHoi);
                $isDangXuLy = $model->getCauHoiDangXuLy();
                if ($result != false) {
                    for ($i = 0; $i < count($result); $i++) {
                        $row = $result[$i];
                        $classCH = $row['ma_cauhoi'];
                        if ($row['trangthai'] == 0) {
                            $trangthai = "Đang chờ xử lý";
                        } else if ($row['trangthai'] == 2) {
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
                                if ($trangthai == "Đang xử lý") {
                                ?>
                                    <a href="index.php?controller=PhanHoi&action=phanhoicauhoi&macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-reply-fill"></i> PHẢN HỒI</span></a>
                                <?php
                                }
                                ?>
                                <?php
                                if ($isDangXuLy == false) {
                                ?>
                                    <a href="index.php?controller=PhanHoi&action=chuyentrangthai&macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-toggle-on"></i></i> CHUYỂN TRẠNG THÁI</span></a>
                                <?php
                                }
                                ?>
                                <a href="" class="text-decoration-none"><span class="thaotac"><i class="bi bi-trash"></i> XÓA</span></a>
                            </div>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
                    <script src="js/jquery-3.6.0.min.js"></script>
                    <script src="js/script.js"></script>
                    <script src="js/scriptHome.js"></script>
                    <?php
                }
            }
        }
        //hàm xử lý chức năng tìm kiếm yêu cầu chuyển khẩu
        function timkiemchuyenkhau()
        {
            $model = new PhanHoiModel();
            if (isset($_POST['chuyenkhau'])) {
                $chuyenKhau = $_POST['chuyenkhau'];
                $result = $model->searchCK($chuyenKhau);
                $isDangXuLyCK = $model->getChuyenKhauDangXuLy();
                if ($result != false) {
                    for ($i = 0; $i < count($result); $i++) {
                        $row = $result[$i];
                        $classCH = $row['ma_cauhoi'];
                        if ($row['trangthai'] == 0) {
                            $trangthai = "Đang chờ xử lý";
                        } else if ($row['trangthai'] == 2) {
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
                                if ($trangthai == "Đang xử lý") {
                                ?>
                                    <a href="index.php?controller=PhanHoi&action=phanhoichuyenkhau&machuyenkhau=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-reply-fill"></i> PHẢN HỒI</span></a>
                                <?php
                                }
                                if ($isDangXuLyCK == false) {
                                ?>
                                    <a href="index.php?controller=PhanHoi&action=chuyentrangthai&macauhoi=<?php echo $row['ma_cauhoi'] ?>" class="text-decoration-none"><span class="thaotac"><i class="bi bi-toggle-on"></i></i> CHUYỂN TRẠNG THÁI</span></a>
                                <?php
                                }
                                ?>
                                <a href="" class="text-decoration-none"><span class="thaotac"><i class="bi bi-trash"></i> XÓA</span></a>
                            </div>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
                    <script src="js/jquery-3.6.0.min.js"></script>
                    <script src="js/script.js"></script>
                    <script src="js/scriptHome.js"></script>
                    <?php
                }
            }
        }
        //hàm xử lý chức năng tìm kiếm những câu hỏi or yêu cầu đã hoàn tất
        function timkiemluutru()
        {
            $model = new PhanHoiModel();
            if (isset($_POST['luutru'])) {
                $luutru = $_POST['luutru'];
                $result = $model->searchLuuTru($luutru);
                if ($result != false) {
                    for ($i = 0; $i < count($result); $i++) {
                        $row = $result[$i];
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
                    ?>
                    <script src="js/jquery-3.6.0.min.js"></script>
                    <script src="js/script.js"></script>
                    <script src="js/scriptHome.js"></script>
<?php
                }
            }
        }
        //hàm xử lý chức năng phản hồi câu hỏi
        function phanhoicauhoi()
        {
            $model = new PhanHoiModel();
            $m = new Model();
            $mang = explode('.', $_SESSION['LoginOK']);
            $sql = "Select* from taikhoan where taikhoan = '{$mang[1]}'";
            $connection = mysqli_connect('localhost', 'root', '', 'db_qlnk');
            $tmp = mysqli_query($connection, $sql);
            $conganxa = mysqli_fetch_assoc($tmp);
            $ma_taikhoan = $conganxa['ma_taikhoan'];
            if (isset($_GET['macauhoi'])) {
                $ma_cauhoi = $_GET['macauhoi'];
                $cauHoi = $m->getONE($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
                $hoten = $cauHoi['hoten'];
                $email = $cauHoi['email'];
                $sdt = $cauHoi['sdt'];
                $lydo = $cauHoi['lydo'];
                $ngayhoi = $cauHoi['ngayhoi'];
                $trangthai = $cauHoi['trangthai'];
                $loaicauhoi = $cauHoi['loaicauhoi'];
            }
            if (isset($_POST['btnSubmitCH'])) {
                $noidung = $_POST['noiDungPhanHoi'];
                $ma_cauhoi = $_GET['macauhoi'];
                $cauHoi = $m->getONE($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
                $email = $cauHoi['email'];
                $ngayphanhoi = date("Y-m-d");
                $ma_phanhoi = strtoupper(substr(md5(rand()), 0, 9));
                $PH = [
                    'ma_phanhoi' => $ma_phanhoi,
                    'phanhoi' => $noidung,
                    'ngayphanhoi' => $ngayphanhoi,
                    'ma_taikhoan' => $ma_taikhoan,
                    'ma_cauhoi' => $ma_cauhoi
                ];
                $isInsertPHCH = $model->insertPHCH($PH);
                $isUpdatePHCH = $model->doiTrangThai($ma_cauhoi, $ma_taikhoan);
                if ($isInsertPHCH && $isUpdatePHCH) {
                    $success = "Phản hồi của bạn đã được gửi đi thành công và câu hỏi đã được hoàn tất!";
                    $subject = "[Xã Phú Yên] Phản hồi câu hỏi " . $ma_cauhoi;
                    $body = "<h2>Chào bạn!</h2><br>
                    <h3>Chúng tôi đã xử lý câu hỏi của bạn và đây là phản hồi của chúng tôi:</h3><br>
                    " . $noidung;
                    sendemailforAccount($email, $subject, $body);
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                } else {
                    $success = "Phản hồi của bạn chưa được gửi đi và câu hỏi chưa được hoàn tất!";
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                }
            }
            require_once("views/PhanHoi/phanHoiCauHoi.php");
        }
        //hàm xử lý chức năng phản hồi yêu cầu chuyển khẩu
        function phanhoichuyenkhau()
        {
            $model = new PhanHoiModel();
            $m = new Model();
            $mang = explode('.', $_SESSION['LoginOK']);
            $sql = "Select* from taikhoan where taikhoan = '{$mang[1]}'";
            $connection = mysqli_connect('localhost', 'root', '', 'db_qlnk');
            $tmp = mysqli_query($connection, $sql);
            $conganxa = mysqli_fetch_assoc($tmp);
            $ma_taikhoan = $conganxa['ma_taikhoan'];
            if (isset($_GET['machuyenkhau'])) {
                $ma_cauhoi = $_GET['machuyenkhau'];
                $cauHoi = $m->getONE($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
                $hoten = $cauHoi['hoten'];
                $email = $cauHoi['email'];
                $sdt = $cauHoi['sdt'];
                $lydo = $cauHoi['lydo'];
                $link = "uploads/" . $lydo;
                $ngayhoi = $cauHoi['ngayhoi'];
                $trangthai = $cauHoi['trangthai'];
                $loaicauhoi = $cauHoi['loaicauhoi'];
            }
            if (isset($_POST['btnSubmitCK'])) {
                $noidung = $_POST['noiDungPhanHoi'];
                $ma_cauhoi = $_GET['machuyenkhau'];
                $cauHoi = $m->getONE($ma_cauhoi, 'ma_cauhoi', 'cauhoi');
                $email = $cauHoi['email'];
                $ngayphanhoi = date("Y-m-d");
                $ma_phanhoi = strtoupper(substr(md5(rand()), 0, 9));
                $PH = [
                    'ma_phanhoi' => $ma_phanhoi,
                    'phanhoi' => $noidung,
                    'ngayphanhoi' => $ngayphanhoi,
                    'ma_taikhoan' => $ma_taikhoan,
                    'ma_cauhoi' => $ma_cauhoi
                ];
                $isInsertPHCH = $model->insertPHCH($PH);
                $isUpdatePHCH = $model->doiTrangThai($ma_cauhoi, $ma_taikhoan);
                if ($isInsertPHCH && $isUpdatePHCH) {
                    $success = "Phản hồi của bạn đã được gửi đi thành công và câu hỏi đã được hoàn tất!";
                    $subject = "[Xã Phú Yên] Phản hồi yêu cầu chuyển khẩu " . $ma_cauhoi;
                    $body = "<h2>Chào bạn!</h2><br>
                    <h3>Chúng tôi đã xử lý yêu cầu chuyển khẩu của bạn và đây là phản hồi của chúng tôi:</h3><br>
                    " . $noidung;
                    sendemailforAccount($email, $subject, $body);
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                } else {
                    $success = "Phản hồi của bạn chưa được gửi đi và câu hỏi chưa được hoàn tất!";
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                }
            }
            require_once("views/PhanHoi/phanHoiChuyenKhau.php");
        }
        //hàm xử lý chức năng xóa câu hỏi
        function xoacauhoi(){
            $model = new PhanHoiModel();
            if (isset($_GET['macauhoi'])) {
                if($model->xoaCauHoi($_GET['macauhoi'])){
                    $success = "Xóa câu hỏi thành công!";
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                }else{
                    $success = "Xóa câu hỏi không thành công!";
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                }
            }
        }
        //hàm xử lý chức năng yêu cầu chuyển khẩu
        function xoachuyenkhau(){
            $model = new PhanHoiModel();
            if (isset($_GET['macauhoi'])) {
                if($model->xoaCauHoi($_GET['macauhoi'])){
                    $success = "Xóa yêu cầu chuyển khẩu thành công!";
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                }else{
                    $success = "Xóa yêu cầu chuyển khẩu không thành công!";
                    header("location: index.php?controller=PhanHoi&action=homthu&success=$success");
                }
            }
        }
    }
} else {
    header("location: index.php");
}
?>