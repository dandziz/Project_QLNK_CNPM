<?php 
require_once('view/template/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin người quản lý</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>


    <div class="container mt-2">
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
                    <td><a class="text-decoration-none" href="index.php?controller=Admin&action=delete&mataikhoan=<?php echo $row['ma_taikhoan'] ?>"><i class="fas fa-user-times" style="color:red"></i></a></td>
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
require_once('view/template/footer.php');
?>