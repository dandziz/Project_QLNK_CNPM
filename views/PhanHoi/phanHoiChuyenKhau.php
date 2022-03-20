<?php
if (isset($_SESSION['LoginOK'])) {
    require_once("views/partials-front/header.php");
?>
<head>
    <title>Phản hồi chuyển khẩu</title>
</head>
    <main>
        <div class="container">
            <div class="mt-2 mb-2">
                <a href="index.php?controller=PhanHoi&action=homthu" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                        arrow_back
                    </span> <span>Quay lại</span> </a>
            </div>
            <h3 class="text-uppercase text-center">PHẢN HỒI YÊU CẦU CHUYỂN KHẨU</h3>
            <h5 class="text-uppercase text-center"><?php echo $conganxa['hoten'] ?></h5>
            <div class="row">
                <div class="col-md-6 p-2 me-5 border rounded background-fff">
                    <h4 class="text-uppercase text-center">Gửi phản hồi yêu cầu chuyển khẩu</h4>
                    <form action="" method="POST">
                        <div class="form-floating">
                            <textarea class="form-control" name="noiDungPhanHoi" placeholder="Leave a comment here" id="floatingTextarea" style="height: 400px;" required></textarea>
                            <label for="floatingTextarea">NỘI DUNG PHẢN HỒI</label>
                        </div>
                        <div class="col-md mt-2 d-flex justify-content-center">
                            <button type="submit" name="btnSubmitCK" class="btn btn-primary">GỬI PHẢN HỒI</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 p-2 border rounded background-fff">
                    <h4 class="text-uppercase text-center">Chi tiết yêu cầu chuyển khẩu</h4>
                    <div class="row p-2">
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
                        <div class="col-md-12 d-flex justify-content-between mb-3">
                            <span class="fw-bold fs-5">Ngày hỏi: </span><span class="fs-5"><?php echo isset($ngayhoi) ? $m->getDate($ngayhoi) : '' ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
    require_once("views/partials-front/footer.php");
} else {
    header("location: index.php");
}
?>