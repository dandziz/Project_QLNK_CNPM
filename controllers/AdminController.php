<?php
session_start();
if(isset($_SESSION['LoginAdmin'])){
    require_once 'models/AdminModel.php';
    class AdminController{
        function index(){
            $bdModal = new AdminModal();
            $bdonor = $bdModal->getAllBD();
            $cauhoi = $bdModal->getCount('cauhoi');
            $phanhoi = $bdModal->getCount('phanhoi');
            $sohokhau = $bdModal->getCount('sohokhau');
            $taikhoan = $bdModal->getCount('taikhoan');
            $tamtru = $bdModal->getCount('tamtru');
            $tamvang = $bdModal->getCount('tamvang');
            $thanhvienshk = $bdModal->getCount('thanhvienshk');
            require_once 'views/Admin/index.php';
        }
        function admin(){
            $bdModal = new AdminModal();
            $bdonor = $bdModal->getAllBD();
            require_once 'views/Admin/user.php';
        }
        function add(){
            $error = '';
            if(isset($_POST['submit'])){
                $hoten = $_POST['hoten'];
                $taikhoan = $_POST['taikhoan'];
                $matkhau = $_POST['matkhau'];
                $chucvu = $_POST['chucvu'];
                $conlamviec = 1;
                $password = password_hash($matkhau, PASSWORD_DEFAULT);
                if(empty($hoten) ||  empty($taikhoan) || empty($matkhau) || empty($chucvu) || empty($conlamviec) ){
                    $error = 'Thông tin chưa đầy đủ!';
                }else{
            
                    $bdModal = new AdminModal();
                    $bdArr = [
                        'hoten' => $hoten,
                        'taikhoan' => $taikhoan,
                        'matkhau' => $password,
                        'chucvu' => $chucvu,
                        'conlamviec' => $conlamviec,
                    ];
                    $isAdd = $bdModal->insert($bdArr);
                    if ($isAdd) {
                        $TT=  "Thêm mới thành công";
                    }
                    else {
                        $TT= "Thêm mới thất bại";
                    }
                    header("location: index.php?controller=admin&action=admin&tt=$TT");
                    exit();
                }

            }
            require_once 'views/Admin/themCongAnXa.php';
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
                $taikhoan = $_POST['taikhoan'];
                $matkhau = $_POST['matkhau'];
                $password = password_hash($matkhau, PASSWORD_DEFAULT);
                if(empty($hoten) || empty($chucvu) || empty($conlamviec) || empty($taikhoan) || empty($matkhau)){
                    $error = 'Thông tin chưa đầy đủ!';
                }
                else {
                    
                    //xử lý update dữ liệu vào hệ thống
                    $bdArr = [
                        'ma_taikhoan' => $ma_taikhoan,
                        'hoten' => $hoten,
                        'chucvu' => $chucvu,
                        'conlamviec' => $conlamviec,
                        'taikhoan' => $taikhoan,
                        'matkhau' => $password,
                        
                    ];
                    $isAdd = $bdModal->update($bdArr);

                    if ($isAdd) {
                        $TT= "Sửa thành công";
                    }
                    else {
                        $TT = "Sửa thất bại";
                    }
                    header("Location: index.php?controller=admin&action=admin&tt=$TT");
                    exit();
                }
            }
            require_once 'views/Admin/suaCongAnXa.php';
        }
        function delete(){
            $ma_taikhoan = $_GET['mataikhoan'];
            if (!is_numeric($ma_taikhoan)) {
                header("Location: index.php?controller=admin&action=admin");
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
            header("Location: index.php?controller=admin&action=admin&tt=$TT");
            exit();
        }
    }
}
?>