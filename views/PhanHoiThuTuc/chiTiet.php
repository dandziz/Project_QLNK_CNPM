<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php")
?>
    <main id="content">
        <div class="container">
            <div class="row">
                <form action="index.php?controller=PhanHoiThuTuc&action=phanhoi" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-2">
                    <h3 class="heading text-center mb-5">CHI TIẾT HỒ SƠ TẠM VẮNG/TẠM TRÚ</h3>

                    <div class="form-content">
                        <div class="row">

                            <?php
                            $row = $result;
                            ?>

                            <div class="form-group mb-5 col-lg-3">
                                <label for="type" class="form-label">Mã đơn</label>
                                <input type="text" name="id" value="<?php echo $id ?>" class="form-control" readonly>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-5 col-lg-9">
                                <label for="type" class="form-label">Phân loại</label>
                                <input type="text" name="phanloai" value="<?php $type == 'tamvang' ? $phanloai = 'Thủ tục tạm vắng' : $phanloai = 'Thủ tục tạm trú';
                                                                            echo $phanloai; ?>" class="form-control" readonly>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label for="fullname" class="form-label">Họ và tên </label>
                                <input disabled type="text" value="<?php echo $row["hoten"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label for="fullname" class="form-label">Ngày sinh</label>
                                <input disabled type="text" value="<?php echo $row["ngaysinh"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-4">
                                <label for="fullname" class="form-label">Căn cước công dân</label>
                                <input disabled type="text" value="<?php echo $row["cccd"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-4">
                                <label for="fullname" class="form-label">Nơi cấp cccd</label>
                                <input disabled type="text" value="<?php echo $row["cccd_noicap"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-4">
                                <label for="fullname" class="form-label">Ngày cấp cccd</label>
                                <input disabled type="text" value="<?php echo $row["cccd_capngay"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label for="fullname" class="form-label">Địa chỉ thường trú</label>
                                <input disabled type="text" value="<?php echo $row["diachithuongtru"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-6">
                                <label for="fullname" class="form-label">Chỗ ở hiện nay</label>
                                <input disabled type="text" value="<?php echo $row["choohiennay"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-12">
                                <label for="fullname" class="form-label">Lý do/Ý kiến của người làm đơn</label>
                                <input disabled type="text" value="<?php echo $row["lydo"] ?>" class="form-control">
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-12">
                                <label for="fullname" class="form-label">Email</label>
                                <input type="text" name="email" value="<?php echo $row["email"] ?>" class="form-control" readonly>
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-2 col-lg-12">
                                <label for="fullname" class="form-label">Hình thức phản hồi</label>
                                <input name="feedback" type="text" value="<?php echo $row["phanhoi"] ?>" class="form-control" readonly>
                                <span class="form-message"></span>
                            </div>
                            <hr>
                            <div>
                                <label for="confirm" class="form-label">ĐỒNG Ý PHÊ DUYỆT THỦ TỤC?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pheduyet" value="yes" id="flexRadioDefault1" checked required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Đồng ý
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pheduyet" value="no" id="flexRadioDefault2" required>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Không đồng ý
                                    </label>
                                </div>
                            </div>
                        <?php
                        ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="mt-5"></div>
                        <button type="submit" class="form-submit btn btn-primary" name="btnSubmit">Xác nhận</button>
                    </div>
            </div>
            </form>
        </div>
        </div>
    </main>
    <?php
    require("views/partials-front/footer.php");
}
    ?>