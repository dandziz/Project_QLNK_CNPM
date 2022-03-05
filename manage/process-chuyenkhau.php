<?php
// session_start();
require "../config/config.php";
require('partials-front/header.php');
require_once "../classprocessSQL.php";
require_once "../process-string.php";
$ps = new Process();
if (!isset($_SESSION['LoginOK'])) {
    header('location: ../index.php');
} else {
    if(isset($_GET['cccd'])){
        $cccd = $_GET['cccd'];
        $sql = "Select* from tb_chitietshk where cccd = '$cccd'";
        $result = mysqli_query($conn, $sql);
        $rowinfoshk = mysqli_fetch_assoc($result);
?>
    <head>
        <title>Thành viên</title>
    </head>
    <div class="container" style="margin-top: 72px;">
        <div class="mt-2 mb-2">
            <a href="shkmanage.php" class="text-decoration-none d-flex align-items-center"><span class="material-icons">
                    arrow_back
                </span> <span>Quay lại</span> </a>
        </div>
        <div class="bg-secondary rounded shadow-sm p-2 mb-2 text-white">
            <h5>Mã căn cước: <?php echo $cccd ?></h5>
            <input type="text" readonly style="display: none;" id="cccdmainde" value="<?php echo $cccd ?>">
            <h5>Họ Và Tên : <?php echo $rowinfoshk['hoten'] ?></h5>
            <h5>Số sổ hộ khẩu: <?php echo $rowinfoshk['ma_shk'] ?></h5>

        </div>
        <div class="row">
            <div class="col-md">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <h5>Chuyển thành viên</h5>
                    </div>
                </nav>
                <!-- Chỉnh sửa  -->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-info-tab">
                        <form action="process-updatemashk.php" method="POST" class="form-control mt-3" >
                            <div class="d-flex flex-row align-items-center justify-content-between">
                                <span class="me-2 fw-bold fs-1">Mã số cccd cần chuyển: </span>
                                <input class="form-control mt-2" name="cccdupdate" value="<?php echo $cccd; ?>" style="max-width: 150px;" readonly>
                            </div>
                           
                            <div>
                                <div class="displayblockshk">
                                <div class="col-md me-1 mt-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Chọn Mã Sổ Hộ Khẩu Mới:</label>
                                    <select class="form-select" aria-label="Default select example" id="ma_shk" name="ma_shk" required>
                                    
                                    <?php
                                    $sqlma_shk = "Select * from tb_sohokhau ";
                                    $resultma_shk = mysqli_query($conn, $sqlma_shk);
                                    if (mysqli_num_rows($resultma_shk)) {
                                        while ($rowma_shk = mysqli_fetch_assoc($resultma_shk)) {
                                    ?>
                                            <option value="<?php echo $rowma_shk['ma_shk'] ?>"><?php echo $rowma_shk['ma_shk'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                </div>
                                </div>
                                
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit" id="smUpdateshk" name="smUpdateshk" onclick="return confirm('Bạn chắc chắn muốn chuyển?')">Xác Nhận Chuyển</button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                    
                   
                  
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    </body>

    </html>
<?php
    }
}

?>