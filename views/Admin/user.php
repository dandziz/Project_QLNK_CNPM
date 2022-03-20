<?php 
if(isset($_SESSION['LoginAdmin'])){
    require_once('views/template/header.php');
?>
<head>
<title>Admin người quản lý</title>
</head>

    <div class="container mt-2">
        <?php
            if(isset($_GET['tt'])){
                ?>
                <p class="fw-bold"><?php echo $_GET['tt'] ?></p>
                <?php
            }
        ?>
        <a href="index.php?controller=Admin&action=add" class="text-decoration-none"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fas fa-user-plus"></i> Thêm người quản lý</button></a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên người quản lý</th>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Sửa thông tin</th>
                    <th scope="col">Xóa người quản lý</th>
                </tr>
                <?php
                for($i =0; $i < count($bdonor);$i++){
                    $row = $bdonor[$i];
                ?>
                <tr>
                    <th scope="row"><?php echo $row['ma_taikhoan'] ?></th>
                    <td><?php echo $row['hoten'] ?></td>
                    <td><?php echo $row['taikhoan'] ?></td>
                    <td><a class="text-decoration-none" href="index.php?controller=Admin&action=edit&mataikhoan=<?php echo $row['ma_taikhoan'] ?>"><i class="fas fa-user-edit" style="color:blue"></i></a></td>
                    <td><a class="text-decoration-none" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này?')" href="index.php?controller=Admin&action=delete&mataikhoan=<?php echo $row['ma_taikhoan'] ?>"><i class="fas fa-user-times" style="color:red"></i></a></td>
                </tr>
                <?php
                }
                ?>
            </thead>
            <tbody>
               
            </tbody>
        </table>
    </div>

    

  
<?php 
}
require_once('views/template/footer.php');
?>