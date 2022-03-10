<?php
include('../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('../model.php');
    $ps = new Process();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style/formKhaibao.css">
</head>

<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php">Trang chủ</a>
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
                            <a href="../../login.php"><button class="btn btn-outline-success" type="button">Đăng nhập</button></a>
                            <?php
                            }else{
                            ?>
                            <a href="index.php"><button class="btn btn-outline-success me-2" type="button">Quản Lý</button></a>
                            <a href="../../BTL_QLNK/logout.php"><button class="btn btn-outline-success" type="button">Đăng xuất</button></a>
                            <?php
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <h4 class="text-center mt-2">QUẢN LÝ NHÂN KHẨU</h4>
                <h5 class="text-center mt-2">CÁN BỘ: NGUYỄN VĂN B</h5>
                <div class="col-md-12 bg-secondary mt-3 ms-3 me-3">
                    <div>
                        <a href="taosohokhau/add-shk.php"><button type="button" class="btn btn-primary mt-2">THÊM HỘ KHẨU</button></a>
                        <a href="tachkhau/tachkhau.php"><button type="button" class="btn btn-primary mt-2">TÁCH KHẨU</button></a>
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
                        $result = $ps->getALLElements('tb_sohokhau');
                        for($i = 0; $i < count($result); $i++){
                            $row = $result[$i];
                        ?>
                        <div class="col-md-2 mt-2">
                            <div class="card">
                                <img src="../images/background/2.png" class="card-img-top img-fluid" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['ma_shk']?></h5>
                                    <a href="shkmanage.php?mashk=<?php echo $row['ma_shk']?>" class="btn btn-primary">Xem thông tin</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="body-footer">
        <div class="container-fluid">
            <div class="d-flex flex-row justify-content-around" style="height: 30px;">
                <div>
                    <span class="fs-6">&copy; <span class="fs-6 text-center">Bản quyền thuộc công an xã ...</span></span>
                </div>
                <div>
                    <span class="fs-6"><span class="fs-6 text-center">Hotline: 0366887398</span></span>
                </div>
                <div>
                    <span class="fs-6"><span class="fs-6 text-center">Email: Daodan2612@gmail.com</span></span>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/Validator.js"></script>
</body>
</html>
<?php
} else {
    header("location: ../index.php");
}
?>