<?php
if (isset($_SESSION['LoginOK'])) {
require("views/partials-front/header.php")

?>
<head>
<title>Trang chủ quản lý</title>
</head>
<main>
        <div class="container">
            <div class="row">
                <h4 class="text-center mt-2">QUẢN LÝ NHÂN KHẨU</h4>
                <h5 class="text-center mt-2 text-uppercase">CÁN BỘ: <?php echo $cax['hoten'] ?></h5>
                <div class="col-md-12 bg-secondary mt-3 ms-3 me-3">
                    <div>
                        <a href="index.php?controller=CongAnXa&action=themhokhau"><button type="button" class="btn btn-primary mt-2">THÊM HỘ KHẨU</button></a>
                        <a href="index.php?controller=PhanHoi&action=homthu"><button type="button" class="btn btn-primary mt-2">HÒM THƯ</button></a>
                        <a href="index.php?controller=PhanHoiThuTuc&action=index"><button type="button" class="btn btn-primary mt-2">THỦ TỤC</button></a>
                    </div>
                    <div class="col-md-4 mt-2">
                        <form class="flex-row">
                            <input class="form-control me-2" type="search" id="mashk" placeholder="Tìm kiếm sổ hộ khẩu theo mã sổ hộ khẩu hoặc cccd" aria-label="Search">
                            <button class="btn btn-success mt-1" id="searchSHK" type="button">Tìm kiếm</button>
                        </form>
                    </div>
                    <hr class="text-white">
                </div>
                <div class="col-md-12 bg-secondary mb-3 ms-3 me-3 pb-5">
                    <div class="row" id="allshk">
                        <?php
                        if($result!=false){
                        for($i = 0; $i < count($result); $i++){
                            $row = $result[$i];
                        ?>
                        <div class="col-md-2 mt-2">
                            <div class="card">
                                <img src="images/background/2.png" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['ma_shk']?></h5>
                                    <a href="index.php?controller=CongAnXa&action=quanlyshk&mashk=<?php echo $row['ma_shk'] ?>" class="btn btn-primary">Xem thông tin</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
require("views/partials-front/footer.php");
                    }else{
                        header("location: index.php");
                    }
?>