<?php
session_start();
require_once 'models/DangNhapModel.php';
require_once 'models/Model.php';
class DangNhapController{
    function dangnhap(){
        $model = new DangNhapModel();
        if(isset($_POST['btnsignin'])){
            $user = $_POST['taikhoan'];
            $pass = $_POST['password'];
            $DN = [
                'user' => $user,
                'pass' => $pass
            ];
            $result = $model->dangNhapCAX($DN);
            if($result==true){
                $_SESSION['LoginOK'] = '2.'.$user;
                header("location: index.php?controller=CongAnXa&action=index");
            }else{
                $result = $model->dangNhapAdmin($DN);
                if($result==true){
                    $_SESSION['LoginAdmin'] = '1.'.$user;
                    header("location: index.php?controller=Admin&action=index");
                }
                // header("location: index.php");
            }
        }
        require_once("views/DangNhap/login.php");
    }
    function dangxuat(){
        if(isset($_SESSION['LoginOK'])){
            unset($_SESSION['LoginOK']);
            header('location: index.php');
        }
        if(isset($_SESSION['LoginAdmin'])){
            unset($_SESSION['LoginAdmin']);
            header('location: index.php');
        }
    }
}
?>