<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khai báo tạm trú | tạm vắng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style/formKhaibao.css">
</head>
<body>
    <?php
        require "./partials-front/header.php"
    ?>
    
    <div class="main container" style="background-color: #f5f5f5;">
        <form action="./process-khaibao.php" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-1">
            <h3 class="heading text-center mb-5">HỒ SƠ ĐĂNG KÝ TẠM TRÚ</h3>
            <span class="note"><strong>Ghi chú: </strong>Các thông tin có dấu <span class="icon-required">(*)</span> là thông tin bắt buộc phải nhập</span>

            <div class="form-content">
                <h5 class="heading-content mt-3">THỦ TỤC HÀNH CHÍNH YÊU CẦU</h5>
                <hr class="mb-3 line-space">

                <div class="form-group mb-5">
                    <label for="type" class="form-label">Thủ tục <span class="icon-required">(*)</span></label>
                    <select id="type" name="type" class="form-control">
                      <option value="TamVang">Đăng ký tạm vắng</option>
                      <option value="TamTru">Đăng ký tạm trú</option>
                    </select>
                    <span class="form-message"></span>
                </div>

                <h5 class="heading-content mt-5">TỜ KHAI THÔNG TIN</h5>
                <hr class="mb-3 line-space">

                <div class="row">
                    <div class="form-group mb-5 col-lg-12">
                        <label for="fullname" class="form-label">Họ và tên <span class="icon-required">(*)</span></label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Bình Nguyễn" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-5 col-lg-6">
                        <label for="address" class="form-label">Địa chỉ thường trú <span class="icon-required">(*)</span></label>
                        <input id="address" name="address" type="text" placeholder="Phường/Quận/TP..." class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group mb-5 col-lg-6">
                        <label for="address_now" class="form-label">Nơi ở hiện tại <span class="icon-required">(*)</span></label>
                        <input id="address_now" name="address_now" type="text" placeholder="Phường/Quận/TP..." class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-4">
                        <label for="birthday" class="form-label">Ngày sinh <span class="icon-required">(*)</span></label>
                        <input id="birthday" name="birthday" type="date" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-4">
                        <label for="gender" class="form-label">Giới tính <span class="icon-required">(*)</span></label>
                        <select id="gender" name="gender" class="form-control">
                          <option value="male">Giới tính: nam</option>
                          <option value="female">Giới tính: nữ</option>
                        </select>
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-lg-4 mb-4">
                        <label for="idcard" class="form-label">Số CCCD/CMND <span class="icon-required">(*)</span></label>
                        <input id="idcard" name="idcard" type="text" placeholder="" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-lg-4 mb-4">
                        <label for="idcard_address" class="form-label">Nơi cấp <span class="icon-required">(*)</span></label>
                        <input id="idcard_address" name="idcard_address" type="text" placeholder="" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-lg-4 mb-4">
                        <label for="idcard_date" class="form-label">Ngày cấp <span class="icon-required">(*)</span></label>
                        <input id="idcard_date" name="idcard_date" type="date" class="form-control">
                        <span class="form-message"></span>
                    </div>   

                    <div class="form-group col-lg-6 mb-4">
                        <label for="number" class="form-label">Số điện thoại <span class="icon-required">(*)</span></label>
                        <input id="number" name="number" type="text" placeholder="VD: 09xxxxxxx" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    <div class="form-group col-lg-6 mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text" placeholder="VD: binhnguyen123@gmail.com" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>

                <h5 class="heading-content mt-5">THÔNG TIN Ý KIẾN CHỦ HỘ</h5>
                <hr class="mb-3 line-space">
                <div class="form-group mb-5">
                    <label for="other" class="form-label">Nội dung</label>
                    <input id="other" name="other" type="text" placeholder="Nội dung ý kiến" class="form-control">
                    <span class="form-message"></span>
                </div>

                <h5 class="heading-content mt-5">THÔNG TIN NHẬN THÔNG BÁO TÌNH TRẠNG HỒ SƠ</h5>
                <hr class="mb-3 line-space">

                <div class="form-group mb-5">
                    <label for="feedback" class="form-label">Hình thức nhận <span class="icon-required">(*)</span></label>
                    <select id="feedback" name="feedback" class="form-control">
                      <option value="">-- Chọn hình thức nhận phản hồi --</option>
                      <option value="Nhận qua cổng thông tin">Nhận qua cổng thông tin</option>
                      <option value="Nhận trực tiếp tại trụ sở cơ quan chức năng">Nhận trực tiếp tại trụ sở cơ quan chức năng</option>
                    </select>
                    <span class="form-message"></span>
                </div>

                <div class="form-group mb-5">
                    <input type="checkbox" name="confirm" id = "confirm">
                    <label for="confirm" class="form-label">Tôi xin chịu trách nhiệm trước pháp luật về lời khai trên</label>
                    <span class="form-message"></span>
                </div>

                <button type="submit" class="form-submit btn btn-primary" name="btnSubmit" >Ghi và gửi hồ sơ</button>

            </div>
        </form>
    </div>

    <?php
        require "./partials-front/footer.php"
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></scri>
    <script src="./js/Validator.js"></script>

    <script>
        Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#type','Vui lòng chọn loại hồ sơ'),
                Validator.isRequired('#fullname','Vui lòng điền đầy đủ họ tên'),
                Validator.isRequired('#address','Vui lòng điền đầy đủ địa chỉ'),
                Validator.isRequired('#address_now','Vui lòng điền đầy đủ địa chỉ'),
                Validator.isRequired('#birthday','Vui lòng chọn ngày sinh'),
                Validator.isRequired('#gender','Vui lòng chọn giới tính'),
                Validator.isRequired('#idcard','Vui lòng điền CCCD/CMND'),
                Validator.isRequired('#idcard_address','Vui lòng điền trường này'),
                Validator.isRequired('#idcard_date','Vui lòng điền trường này'),
                Validator.isRequired('#feedback','Vui lòng chọn hình thức'),
                Validator.isRequired('#confirm','Vui lòng xác nhận'),
                Validator.isRequired('#number','Vui lòng điền số điên thoại'),
            ]
        })
    </script>
    <?php
        if (isset($_GET['notice'])) {
    ?>
        <script>
            var message;
            var checkMessage = () => notice = <?php echo $_GET['notice'];?> ? message = 'Gửi hồ sơ thành công' : message = 'Đã xảy ra lỗi, vui lòng thử lại';
            alert(checkMessage());
        </script>
    <?php
        }
    ?>
</body>
</html>