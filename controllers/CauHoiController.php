<?php
session_start();
require_once 'models/CauHoiModel.php';
require_once 'models/Model.php';
require_once("send_email.php");
class CauHoiController{
    function guicauhoi(){
        $model = new CauHoiModel();
        $dang = 1;
        if(isset($_POST['btnSubmit'])){
            $mach = strtoupper(substr(md5(rand()), 0, 9));
            $statusMsg = '';
            $hoten = $_POST['fullname'];
            $email = $_POST['email'];
            $lydo = $_POST['content'];
            $ngayhoi = date('Y/m/d');
            $ngayhoi = (String)$ngayhoi;
            $loaicauhoi = $_POST['type'];
            $sdt = $_POST['number'];
            $trangthai = 0;
            if($_POST['type']==1){
                $CH = [
                    'mach' => $mach,
                    'hoten' => $hoten,
                    'email' => $email,
                    'lydo' => $lydo,
                    'ngayhoi' => $ngayhoi,
                    'loaicauhoi' => $loaicauhoi,
                    'sdt' => $sdt,
                    'trangthai' => $trangthai
                ];
                $isAddCH = $model->insertCH($CH);
                if($isAddCH){
                    $reply = "Câu hỏi đã được gửi đi! Hãy kiểm tra hộp thư để xem thông tin chi tiết.";
                    $subject = "[Xã Phú Yên] Câu hỏi của bạn đã được gửi đi!";
                    $body = "Việc gửi câu hỏi trực tuyến của bạn đã được gửi đi và chờ được phản hồi. Mã câu hỏi của bạn là: ".$mach.".\nNội dung câu hỏi:\n{$lydo}";
                    sendemailforAccount($email, $subject, $body);
                    require_once("views/CauHoi/cauhoi.php");
                }else{
                    $reply = "Câu hỏi chưa được gửi đi!";
                    require_once("views/CauHoi/cauhoi.php");
                }
            }
        }
        require_once("views/CauHoi/cauhoi.php");
    }
    function thutucchuyenkhau(){
        $model = new CauHoiModel();
        $dang = 2;
        if(isset($_POST['btnSubmit'])){
            $mach = strtoupper(substr(md5(rand()), 0, 9));
            $reply = '';
            $hoten = $_POST['fullname'];
            $email = $_POST['email'];
            $lydo = $_POST['content'];
            $ngayhoi = date('Y/m/d');
            $ngayhoi = (String)$ngayhoi;
            $loaicauhoi = $_POST['type'];
            $sdt = $_POST['number'];
            $trangthai = 0;
            if($_POST['type']==2){
                $targetDir = "uploads/";
                $temp = explode(".", $_FILES["file"]["name"]);
                $extension = end($temp);
                if(count($temp)>=2){        
                    $fileName = "GiayChuyenHoKhau".$sdt.date('d').date('m').date('Y').'.'.end($temp);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                    if(!empty($_FILES["file"]["name"])){
                        // Allow certain file formats
                        $allowTypes = array('docx', 'doc');
                        if(in_array($fileType, $allowTypes)){
                            // Upload file to server
                            if(!file_exists($targetFilePath)){
                                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                                    $CH = [
                                        'mach' => $mach,
                                        'hoten' => $hoten,
                                        'email' => $email,
                                        'lydo' => $fileName,
                                        'ngayhoi' => $ngayhoi,
                                        'loaicauhoi' => $loaicauhoi,
                                        'sdt' => $sdt,
                                        'trangthai' => $trangthai
                                    ];
                                    $isAddCH = $model->insertCH($CH);
                                    if($isAddCH){
                                        $reply = "Yêu cầu chuyển khẩu đã được gửi đi! Hãy kiểm tra hộp thư để xem thông tin chi tiết.";
                                        $subject = "[Xã Phú Yên] Yêu cầu chuyển khẩu của bạn đã được gửi đi!";
                                        $body = "Việc gửi yêu cầu chuyển khẩu trực tuyến của bạn đã được gửi đi và chờ được phản hồi. Mã yêu cầu chuyển khẩu của bạn là: ".$mach.".";
                                        sendemailforAccount($email, $subject, $body);
                                        require_once("views/CauHoi/cauhoi.php");
                                    }else{
                                        $reply = "Yêu cầu chuyển khẩu chưa được gửi đi!";
                                        require_once("views/CauHoi/cauhoi.php");
                                    }
                                }else{
                                    $reply = "Xin lỗi chúng tôi không thể upload file của bạn.";
                                }
                            }else{
                                $reply = "Đơn của bạn đã được gửi đi rồi!";
                            }
                        }else{
                            $reply = "Xin lỗi chỉ có file DOCX được gửi đi!";
                        }
                    }else{
                        $reply = "Hãy chọn file để UPLOAD.";
                    }
                }
                // Display status message
                // $reply;
            }
        }
        require_once("views/CauHoi/cauhoi.php");
    }
}
?>