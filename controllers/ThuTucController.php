<?php
session_start();
require_once 'models/ThuTucModel.php';
require_once 'models/Model.php';
require_once("send_email.php");
class ThuTucController{
    function thutuctamtru(){
        $model = new ThuTucModel();
        $dang = 1;
        if(isset($_POST['btnSubmitTT'])){
            $madon = strtoupper(substr(md5(rand()), 0, 9));
            $type = $_POST['type'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $address_now = $_POST['address_now'];
            $birthday = $_POST['birthday'];
            $idcard = $_POST['idcard'];
            $idcard_address = $_POST['idcard_address'];
            $idcard_date = $_POST['idcard_date'];
            $email = $_POST['email'];
            $other = $_POST['other'];
            $feedback = $_POST['feedback'];
            $conganxa = "Phú Yên";
            $Tamtru = [
                'madon' => $madon,
                'type' => $type,
                'conganxa' => $conganxa,
                'fullname' => $fullname,
                'address' => $address,
                'address_now' => $address_now,
                'birthday' => $birthday,
                'idcard' => $idcard,
                'idcard_address' => $idcard_address,
                'idcard_date' => $idcard_date,
                'email' => $email,
                'other' => $other,
                'feedback' => $feedback
            ];
            $isAddTT = $model->insertTT($Tamtru);
            if($isAddTT){
                $success = "Gửi thủ tục thành công. Hãy check Email của bạn để kiểm tra!";
                $subject = "[Xã Phú Yên] Thủ tục tạm trú của bạn đã được gửi đi!";
                $body = "Việc thực hiện tạo thủ tục tạm trú trực tuyến của bạn đã hoàn tất và chờ được xác nhận. Mã đơn của bạn là: ".$madon.". Xem thông tin chi tiết về thủ tục <a href='http://localhost/BTL_MVC_QLNK/index.php?controller=ThuTuc&action=TaiXuong'>tại đây.</a>";
                sendemailforAccount($email, $subject, $body);
                require_once 'views/ThuTuc/khaiBaoOnline.php';
            }else{
                $success = "Gửi thủ tục không thành công. Hãy thử lại!";
                require_once 'views/ThuTuc/khaiBaoOnline.php';
            }
            exit();
        }
        require_once 'views/ThuTuc/khaiBaoOnline.php';
    }
    function thutuctamvang(){
        $model = new ThuTucModel();
        $dang = 2;
        if(isset($_POST['btnSubmitTT'])){
            $madon = strtoupper(substr(md5(rand()), 0, 9));
            $type = $_POST['type'];
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $address_now = $_POST['address_now'];
            $birthday = $_POST['birthday'];
            $idcard = $_POST['idcard'];
            $idcard_address = $_POST['idcard_address'];
            $idcard_date = $_POST['idcard_date'];
            $email = $_POST['email'];
            $other = $_POST['other'];
            $feedback = $_POST['feedback'];
            $conganxa = "Phú Yên";
            $TamVang = [
                'madon' => $madon,
                'type' => $type,
                'conganxa' => $conganxa,
                'fullname' => $fullname,
                'address' => $address,
                'address_now' => $address_now,
                'birthday' => $birthday,
                'idcard' => $idcard,
                'idcard_address' => $idcard_address,
                'idcard_date' => $idcard_date,
                'email' => $email,
                'other' => $other,
                'feedback' => $feedback
            ];
            $isAddTT = $model->insertTV($TamVang);
            if($isAddTT){
                $success = "Gửi thủ tục thành công. Hãy check Email của bạn để kiểm tra!";
                $subject = "[Xã Phú Yên] Thủ tục tạm trú của bạn đã được gửi đi!";
                $body = "Việc thực hiện tạo thủ tục tạm trú trực tuyến của bạn đã hoàn tất và chờ được xác nhận. Mã đơn của bạn là: ".$madon.". Xem thông tin chi tiết về thủ tục <a href='http://localhost/BTL_MVC_QLNK/index.php?controller=ThuTuc&action=TaiXuong'>tại đây.</a>";
                sendemailforAccount($email, $subject, $body);
                require_once 'views/ThuTuc/khaiBaoOnline.php';
            }else{
                $success = "Gửi thủ tục không thành công. Hãy thử lại!";
                require_once 'views/ThuTuc/khaiBaoOnline.php';
            }
            exit();
        }
        require_once 'views/ThuTuc/khaiBaoOnline.php';
    }
    function taixuong(){
        $model = new ThuTucModel();
        $m = new Model();
        if(isset($_POST['searchTT'])){
            $madon = $_POST['madon'];
            $resultTT = $m->getONE($madon, 'ma_dontt', 'tamtru');
            $resultTV = $m->getONE($madon, 'ma_dontv', 'tamvang');
            if($resultTT!=false || $resultTV!=false){
                $loaitt = '';
                if ($resultTT != false) {
                    $don = "tạm trú";
                    $loaitt = "TẠM TRÚ";
                    $hoten = $resultTT['hoten'];
                    $ngaysinh = $resultTT['ngaysinh'];
                    $cccd = $resultTT['cccd'];
                    $cccd_noicap = $resultTT['cccd_noicap'];
                    $cccd_capngay = $resultTT['cccd_capngay'];
                    $diachithuongtru = $resultTT['diachithuongtru'];
                    $choohiennay = $resultTT['choohiennay'];
                    $ngaybatdau = '';
                    $lydo = $resultTT['lydo'];
                    $email = $resultTT['email'];
                    $phanhoi = $resultTT['phanhoi'];
                    if($resultTT['xacnhan']==1){
                        $xacnhan = "Đã xác nhận";
                        $ngaybatdau = $m->getDate($resultTT['ngaybatdau']);
                    }else{
                        $xacnhan = "Đang chờ phê duyệt";
                    }
                }else{
                    $don = "tạm vắng";
                    $loaitt = "TẠM VẮNG";
                    $hoten = $resultTV['hoten'];
                    $ngaysinh = $resultTV['ngaysinh'];
                    $cccd = $resultTV['cccd'];
                    $cccd_noicap = $resultTV['cccd_noicap'];
                    $cccd_capngay = $resultTV['cccd_capngay'];
                    $diachithuongtru = $resultTV['diachithuongtru'];
                    $choohiennay = $resultTV['choohiennay'];
                    $ngaybatdau = '';
                    $lydo = $resultTV['lydo'];
                    $email = $resultTV['email'];
                    $phanhoi = $resultTV['phanhoi'];
                    if($resultTV['xacnhan']==1){
                        $xacnhan = "Đã xác nhận";
                        $ngaybatdau = $m->getDate($resultTV['ngaybatdau']);
                    }else{
                        $xacnhan = "Đang chờ phê duyệt";
                    }
                }
                require_once 'views/ThuTuc/taiXuong.php';
            }
        }
        require_once 'views/ThuTuc/taiXuong.php';
    }
}
?>