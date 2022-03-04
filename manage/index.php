<?php
include('../config/config.php');
if (isset($_SESSION['LoginOK'])) {
    include('partials-front/header.php');
?>
    <main>
   
        <div class="container">
            <div class="row">
                <h4 class="text-center mt-2">QUẢN LÝ NHÂN KHẨU</h4>
                <h5 class="text-center mt-2">CÁN BỘ: NGUYỄN VĂN B</h5>
                <div class="col-md-12 bg-secondary mt-3 ms-3 me-3">
                    <div>
                        <button type="button" class="btn btn-primary mt-2"><a href="../themthanhvienshk.php">THÊM SỔ HỘ KHẨU</a></button>
                        <button type="button" class="btn btn-primary mt-2">HỘP THƯ</button>
                        <button type="button" class="btn btn-primary mt-2">CHUYỂN KHẨU</button>
                        <button type="button" class="btn btn-primary mt-2">TÁCH KHẨU</button>
                    </div>
                    <div class="col-md-4 mt-2">
                        <form class="flex-row">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm sổ hộ khẩu" aria-label="Search">
                            <button class="btn btn-success mt-1" type="submit">Tìm kiếm</button>
                        </form>
                    </div>
                    <hr class="text-white">
                </div>
                <div class="col-md-12 bg-secondary mb-3 ms-3 me-3 pb-5">
                <div class="row" style="margin-left: 8px;">
                            <?php
                            $sqlshk = "Select * from tb_sohokhau";
                            $resultshk =  mysqli_query($conn, $sqlshk);
                            if (mysqli_num_rows($resultshk) > 0) {
                                while ($rowshk = mysqli_fetch_assoc($resultshk)) {
                                    $ma_shk = $rowshk['ma_shk'];
                                    $hotenchuho = $rowshk['hotenchuho'];
                                    $noithuongtru = $rowshk['noithuongtru'];
                                    $ngaycap = $rowshk['ngaycap'];
                                    $truongcongan = $rowshk['truongcongan'];
                                    $thanhpho = $rowshk["thanhpho"];

                            ?>
                                    <div class="col-md-3 mt-2">
                                        <div class="col-md" style="margin-left: -12px;">
                                            <div class="card">
                                                
                                                <img src="../images/background/2.png" class="card-img-top img-fluid" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title">Mã shk: <?php echo $ma_shk ?></h5>
                                                    <a href="shkmanage.php?mashk=<?php echo $ma_shk ?>" class="card-link text-decoration-none">Xem Thông Tin SHK</a>
                                                </div>
                                                
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
        </div>
    </main>
<?php
    include('partials-front/footer.php');
} 
?>