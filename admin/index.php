<?php 
include('partials-front/header.php');
// require "../config/config.php";
// if (isset($_SESSION['LoginOK']) && substr($_SESSION['LoginOK'], 0, 1) == '3') {
    
// } else {
//     header('location: ../index.php');
// }
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
                    
                    <br>
                    Số sổ hộ khẩu
                </div>

                <div class="col-4">
                    
                    <br>
                    Số chi tiết sổ hộ khẩu
                </div>

                <div class="col-4">
                    
                    <br>
                    Số người quản lý
                </div>

                <div class="col-4">
                    
                    <br>
                    Số phiếu câu hỏi
                </div>

            
                <div class="col-4">
                    
                    <br>
                    Số phiếu tạm trú, tạm vắng
                </div>
                
            </div>
        </div>
    </div>
</div>
<?php include('partials-front/footer.php') ?>