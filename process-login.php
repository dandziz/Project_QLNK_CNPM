<?php
    include('config/config.php');
    if (isset($_POST["btnsignin"])) {
        $user = $_POST['taikhoan'];
        $password = $_POST['password'];
        $sql = "Select* from tb_taikhoan where taikhoan = '{$user}'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['matkhau'])){
                if($row['capbac']==1){

                }else{
                    $_SESSION['LoginOK'] = '2'.$row['ma_nguoidung'];
                    header("location: manage/index.php");
                }
            }else{
                $error="Mật khẩu không chính xác!";
                header("location: login.php?error=$error");
            }
        }
    }else{
        header("location: index.php");
    }
?>