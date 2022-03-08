<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./style/formChuyenKhau.css">
</head>
<body>
    <?php
        require "./partials-front/header.php"
    ?>

    <div class="main container" style="background-color: #f5f5f5;">
        <form action="./process-chuyenkhau.php" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-2">
            <h3 class="heading text-center mb-5">BIỂU MẪU</h3>
            <span class="note"><strong>Ghi chú: </strong>Các thông tin có dấu <span class="icon-required">(*)</span> là thông tin bắt buộc phải nhập</span>

            <div class="form-content">
                <h5 class="heading-content mt-3">PHÂN LOẠI YÊU CẦU</h5>
                <hr class="mb-3 line-space">

                <div class="form-group mb-5">
                    <label for="type" class="form-label">Phân loại <span class="icon-required">(*)</span></label>
                    <select id="type" name="type" class="form-control">
                      <option value="Chuyển Khẩu">Yêu cầu chuyển khẩu</option>
                      <option value="Tách Khẩu">Yêu cầu tách khẩu</option>
                      <option value="Câu hỏi khác">Khác</option>
                    </select>
                    <span class="form-message"></span>
                </div>

                <h5 class="heading-content mt-5">TỜ KHAI THÔNG TIN</h5>
                <hr class="mb-3 line-space">

                <div class="row">
                    <div class="form-group mb-2 col-lg-12">
                        <label for="fullname" class="form-label">Họ và tên <span class="icon-required">(*)</span></label>
                        <input id="fullname" name="fullname" type="text" placeholder="VD: Bình Nguyễn" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>

                <h5 class="heading-content mt-5">THÔNG TIN Ý KIẾN CHỦ HỘ</h5>
                <hr class="mb-3 line-space">
                <div class="form-group mb-5">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea style="height:300px" maxlength="2000" row="30" id="content" name="content" placeholder="Nhập nội dung..." class="form-control">

                    </textarea>
                    <span class="form-message"></span>
                </div>

                <h5 class="heading-content mt-5">THÔNG TIN NHẬN PHẢN HỒI</h5>
                <hr class="mb-3 line-space">

                <div class="row">
                    <div class="form-group col-lg-6 mb-4">
                        <label for="number" class="form-label">Số điện thoại <span class="icon-required">(*)</span></label>
                        <input id="number" name="number" type="text" placeholder="VD: 09xxxxxxx" class="form-control">
                        <span class="form-message"></span>
                    </div>
                    
                    <div class="form-group col-lg-6 mb-4">
                        <label for="email" class="form-label">Email <span class="icon-required">(*)</span></label>
                        <input id="email" name="email" type="text" placeholder="VD: binhnguyen123@gmail.com" class="form-control">
                        <span class="form-message"></span>
                    </div>
                </div>

                <button type="submit" class="form-submit btn btn-primary" name="btnSubmit" >Gửi yêu cầu</button>

            </div>
        </form>
    </div>

    <?php
        require "./partials-front/footer.php"
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/Validator.js"></script>

    <script>
        Validator({
            form: '#form-2',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
                Validator.isRequired('#type','Vui lòng chọn loại hồ sơ'),
                Validator.isRequired('#fullname','Vui lòng điền đầy đủ họ tên'),
                Validator.isRequired('#content','Điền đầy đủ nội dung yêu cầu'),
                Validator.isRequired('#number','Vui lòng điền số điên thoại'),
                Validator.isRequired('#email','Vui lòng điền Email'),
                Validator.isEmail('#email','Vui lòng nhập đúng email')
            ]
        })
    </script>
</body>
</html>