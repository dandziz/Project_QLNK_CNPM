<?php
if (isset($_SESSION['LoginOK'])) {
    require("views/partials-front/header.php");
    if($pheduyet=="yes"){
        $ph = "đã được phê duyệt.";
    }else{
        $ph = "đã bị từ chối.";
    }
?>
<main id="content">
        <div class="container">
            <div class="mt-2 mb-2">
                <a href="index.php?controller=PhanHoiThuTuc&action=index" class="text-decoration-none d-flex align-items-center">
                    <i class="bi bi-arrow-left-circle"></i>
                    <span> Quay lại</span> </a>
            </div>
            <div class="row">
                <form action="" method="POST" class="form mt-5 ps-5 pe-5 pt-5 pb-5 container" id="form-3">
                    <h3 class="heading text-center mb-5">MẪU PHẢN HỒI THÔNG TIN</h3>

                    <div class="form-content">
                        <div class="row">
                            <div class="form-group mb-5 col-lg-6">
                                <label for="type" class="form-label">Địa chỉ email nhận phản hồi</label>
                                <input type="text" value="<?php echo $email ?>" name="email" enable class="form-control" readonly> 
                                <span class="form-message"></span>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" value="<?php echo $id ?>" name="mathutuc" class="form-control" readonly style="display: none;">
                                <input type="text" value="<?php echo $pheduyet ?>" name="pheduyet" class="form-control" readonly style="display: none;">
                                <input type="text" value="<?php echo $ma_taikhoan ?>" name="mataikhoan" class="form-control" readonly style="display: none;">
                                <input type="text" value="<?php echo $phanloai ?>" name="type" class="form-control" readonly style="display: none;"> 
                            </div>

                            <div class="form-group mb-2 col-lg-12">
                                <label for="type" class="form-label">Tiêu đề thư</label>
                                <input type="text" name="title" value="[Xã Phú Yên] <?php echo $phanloai ?> <?php echo $id?> <?php echo $ph ?>" enable class="form-control" readonly> 
                                <span class="form-message"></span>
                            </div>
                            <div class="form-group mb-5 col-lg-12">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea style="height:300px" maxlength="2000" row="30" id="content" name="content" class="form-control" required>
                                    Chào bạn!<br>
                                    Chúng tôi gửi thư này để thông báo rằng <?php echo $phanloai.' '.$id ?> của bạn <?php echo $ph ?><br>
                                    Vì lý do như sau: 
                                </textarea>
                                <span class="form-message"></span>
                            </div>

                            <div class="mt-2"></div>
                                <button type="submit" class="form-submit btn btn-primary" name="btnSubmitPH">Gửi đi</button>
                            </div>
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