<?php

require_once 'model/AdminModel.php';
class AdminController{
    function index(){
        $bdModal = new AdminModal();
        $bdonor = $bdModal->getAllBD();
        // $matkhau = password_hash($_POST['matkhau'], PASSWORD_DEFAULT);
        $cauhoi = $bdModal->getCount('tb_cauhoi');
        $phanhoi = $bdModal->getCount('tb_phanhoi');
        $sohokhau = $bdModal->getCount('tb_sohokhau');
        $taikhoan = $bdModal->getCount('tb_taikhoan');
        $tamtru = $bdModal->getCount('tb_tamtru');
        $tamvang = $bdModal->getCount('tb_tamvang');
        $thanhvienshk = $bdModal->getCount('tb_thanhvienshk');
        require_once 'view/AdminCA/index.php';
    }
    function admin(){
        $bdModal = new AdminModal();
        $bdonor = $bdModal->getAllBD();
        require_once 'view/AdminCA/user.php';
    }
    function add(){
        $error = '';
        if(isset($_POST['submit'])){
            $hoten = $_POST['hoten'];
           
            $chucvu = $_POST['chucvu'];
            $conlamviec = $_POST['conlamviec'];
            $ngaykhoitao = $_POST['ngaykhoitao'];
            $capbac = $_POST['capbac'];
            if(empty($hoten) || empty($_POST['chucvu'])|| empty($conlamviec) || empty($ngaykhoitao) || empty($capbac)){
                $error = 'Thông tin chưa đầy đủ!';
            }else{
        
                $bdModal = new AdminModal();
                $bdArr = [
                    'hoten' => $hoten,
                    'chucvu' => $chucvu,
                    'conlamviec' => $conlamviec,
                    'ngaykhoitao' => $ngaykhoitao,
                    'capbac' => $capbac,
                    
                ];
                $isAdd = $bdModal->insert($bdArr);
                if ($isAdd) {
                    $TT=  "Thêm mới thành công";
                }
                else {
                    $TT= "Thêm mới thất bại";
                }
                header("Location: index.php?controller=adminca&action=user&tt=$TT");
                exit();
            }

        }
        require_once 'view/AdminCA/AddAdmin.php';
    }
    function edit(){
        if (!isset($_GET['mataikhoan'])) {
            $_SESSION['error'] = "Tham số không hợp lệ";
            header("Location: index.php?controller=Admin&action=user");
            return;
        }
        $ma_taikhoan = $_GET['mataikhoan'];
        $bdModal = new AdminModal();
        $BD = $bdModal->getBDByMa_taikhoan($ma_taikhoan);
        $error = '';
        if (isset($_POST['submit'])) {
            $hoten = $_POST['hoten'];
           
            $chucvu = $_POST['chucvu'];
            $conlamviec = $_POST['conlamviec'];
            $ngaykhoitao = $_POST['ngaykhoitao'];
            $capbac = $_POST['capbac'];
            if(empty($hoten) || empty($_POST['chucvu'])|| empty($conlamviec) || empty($ngaykhoitao) || empty($capbac)){
                $error = 'Thông tin chưa đầy đủ!';
            }
            else {
                
                //xử lý update dữ liệu vào hệ thống
                $bdArr = [
                    'hoten' => $hoten,
                    'chucvu' => $chucvu,
                    'conlamviec' => $conlamviec,
                    'ngaykhoitao' => $ngaykhoitao,
                    'capbac' => $capbac,
                    
                ];
                $isAdd = $bdModal->update($bdArr);

                if ($isAdd) {
                    $TT= "Sửa thành công";
                }
                else {
                    $TT = "Sửa thất bại";
                }
                header("Location: index.php?controller=adminca&action=user&tt=$TT");
                exit();
            }
        }
        require_once 'view/AdminCA/editAdmin.php';
    }
    function delete(){
        $ma_taikhoan = $_GET['ma_taikhoan'];
        if (!is_numeric($ma_taikhoan)) {
            header("Location: index.php?controller=admin&action=index");
            exit();
        }
        $bdModal = new AdminModal();
        $isDelete = $bdModal->delete($ma_taikhoan);
        if ($isDelete) {
            
            $TT=  "Xóa tài khoản thành công";
        }
        else {
            //báo lỗi
            $TT = "Xóa tài khoản thất bại";
        }
        header("Location: index.php?controller=adminca&action=admin&tt=$TT");
        exit();
    }
}

?>