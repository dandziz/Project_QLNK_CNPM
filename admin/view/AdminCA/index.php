<?php 
require_once('view/template/header.php');
?>
<head>
    <title>Trang chủ Admin</title>
</head>
<div class="container-fluid bg-secondary bg-opacity-50">
    <div class="wrapper">
        <h2>Dashboard</h2>
        <br><br>

        <div class="row">
            <div class="wrapper-col-4">
                <div class="col-4">
                <?php
                        if( $cauhoi != false){
                            echo $cauhoi;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số phiếu câu hỏi
                </div>

                <div class="col-4">
                <?php
                        if( $phanhoi != false){
                            echo $phanhoi;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số phiếu phản hồi
                </div>

                <div class="col-4">
                <?php
                        if( $sohokhau != false){
                            echo $sohokhau;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số sổ hộ khẩu
                </div>

                <div class="col-4">
                <?php
                        if( $taikhoan != false){
                            echo $taikhoan;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số tài khoản
                </div>
                </div>
                <div class="wrapper-col-4">
                <div class="col-4">
                <?php
                        if( $tamtru != false){
                            echo $tamtru;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số phiếu tạm trú
                </div>
                <div class="col-4">
                <?php
                        if( $tamvang != false){
                            echo $tamvang;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số phiếu tạm vắng
                </div>
                <div class="col-4">
                <?php
                        if( $thanhvienshk != false){
                            echo $thanhvienshk;
                        }
                        else{
                            echo "Không có";
                        }
                    ?>
                    <br>
                    Số thành viên trong sổ hộ khẩu
                </div>
                </div>
            
        </div>
    </div>
</div>
<?php require_once('view/template/footer.php'); ?>