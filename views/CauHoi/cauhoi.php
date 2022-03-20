<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi câu hỏi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./style/formChuyenKhau.css">
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

    <div class="main container" style="background-color: #f5f5f5;">
        <div class="mt-2 mb-2">
            <a href="index.php" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                    arrow_back
                </span> <span>Quay lại</span> </a>
        </div>
        <div>
            <?php
                if(isset($reply)){
                    ?>
                    <p class="fw-bold fs-6"><?php echo $reply ?></p>
                    <?php
                }
            ?>
        </div>
        <form action="" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-2" enctype="multipart/form-data" validate>
            <h3 class="heading text-center mb-5">BIỂU MẪU</h3>
            <span class="note"><strong>Ghi chú: </strong>Các thông tin có dấu <span class="icon-required">(*)</span> là thông tin bắt buộc phải nhập</span>

            <div class="form-content">
                <h5 class="heading-content mt-3">PHÂN LOẠI YÊU CẦU (VUI LÒNG CHỌN ĐỂ HIỆN Ô NHẬP THÔNG TIN)</h5>
                <hr class="mb-3 line-space">

                <div class="form-group mb-5">
                    <label for="type" class="form-label">Phân loại <span class="icon-required">(*)</span></label>
                    <select id="type" name="type" class="form-control" required>
                        <?php
                        if(isset($dang) && $dang==1){
                        ?>
                        <option value="1" selected>Gửi Câu Hỏi</option>
                        <?php
                        }else{
                        ?>
                        <option value="1">Gửi Câu Hỏi</option>
                        <?php
                        }
                        ?>
                        <?php
                        if(isset($dang) && $dang==2){
                        ?>
                        <option selected value="2">Yêu cầu chuyển khẩu</option>
                        <?php
                        }else{
                        ?>
                        <option value="2">Yêu cầu chuyển khẩu</option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="form-message"></span>
                </div>
                <div class="form-group mb-5" id="hdch">
                    
                </div>

                <h5 class="heading-content mt-5">TỜ KHAI THÔNG TIN</h5>
                <hr class="mb-3 line-space">
                <div id="form-cauhoi" style="display: none;">
                <div class="row">
                    <div class="form-group mb-2 col-lg-12">
                        <label for="fullname" class="form-label">Họ và tên <span class="icon-required">(*)</span></label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Bình Nguyễn" class="form-control" required>
                        <span class="form-message"></span>
                    </div>
                </div>
                <div id="form-lydo" style="display: none">
                    <h5 class="heading-content mt-5">LÝ DO</h5>
                    <hr class="mb-3 line-space">
                    <div class="form-group mb-5">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea style="height:300px" maxlength="2000" row="30" id="content" name="content" placeholder="Nhập nội dung..." class="form-control">

                        </textarea>
                        <span class="form-message"></span>
                    </div>
                </div>
                <div id="form-file" style="display: none">
                    <h5 class="heading-content mt-5">TẠO YÊU CẦU CHUYỂN KHẨU</h5>
                    <hr class="mb-3 line-space">
                    <label for="content" class="form-label">Tải file dưới đây để nhập dữ liệu và gửi vào ô phía dưới!</label><br>
                    <a href="views/CauHoi/GiayChuyenHoKhau.docx" class="mb-4">Giấy khai báo chuyển khẩu</a><br><br><br>
                    <label for="content" class="form-label">Nơi gửi file</label><br>
                    <input type="file" name="file" id="fileupload">
                </div>
                <h5 class="heading-content mt-5">THÔNG TIN NHẬN PHẢN HỒI</h5>
                <hr class="mb-3 line-space">

                <div class="row">
                    <div class="form-group col-lg-6 mb-4">
                        <label for="number" class="form-label">Số điện thoại <span class="icon-required">(*)</span></label>
                        <input id="number" name="number" type="text" placeholder="VD: 09xxxxxxx" class="form-control" required>
                        <span class="form-message"></span>
                    </div>
                    
                    <div class="form-group col-lg-6 mb-4">
                        <label for="email" class="form-label">Email <span class="icon-required">(*)</span></label>
                        <input id="email" name="email" type="text" placeholder="VD: binhnguyen123@gmail.com" class="form-control" required>
                        <span class="form-message"></span>
                    </div>
                </div>

                <button type="submit" class="form-submit btn btn-primary" name="btnSubmit">Gửi yêu cầu</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/Validator.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/scriptHome.js"></script>
<?php
        require "views/partials-front/footer.php"
    ?>