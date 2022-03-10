<?php
if(isset($_POST['btnSubmit'])){
    $mach = strtoupper(substr(md5(rand()), 0, 9));
    require("config/config.php");
    require("model.php");
    $ps = new Process();
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
        $sql = "Insert into tb_cauhoi values('{$mach}', '{$hoten}', '{$email}', '{$sdt}', '{$lydo}', '{$ngayhoi}', '{$trangthai}', '{$loaicauhoi}')";
        if(mysqli_query($conn, $sql)){
            $statusMsg = "Câu hỏi đã được gửi đi thành công!";
            header("location: cauhoi.php?dang=1&phanhoi=$statusMsg");
        }else{
            $statusMsg = "Câu hỏi đã được gửi đi không thành công.";
            header("location: cauhoi.php?dang=2&phanhoi=$statusMsg");
        }

    }else if($_POST['type']==2){

        // File upload path
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
                        // Insert image file name into database
                        $sql = "Insert into tb_cauhoi values('{$mach}', '{$hoten}', '{$email}', '{$sdt}', '{$fileName}', '{$ngayhoi}', '{$trangthai}', '{$loaicauhoi}')";
                        if(mysqli_query($conn, $sql)){
                            $statusMsg = "Tệp tin ".$fileName. " đã được gửi đi thành công. Mã câu hỏi của bạn là: $mach và hãy chờ đợi Công An Xã phê duyệt và xử lý đơn của bạn!\nNhấn vào <a href='cauhoi.php?dang=2'>đây</a> để trở lại trang trước.";
                        }else{
                            $statusMsg = "Tệp tin gửi đi không thành công.\nNhấn vào <a href='cauhoi.php?dang=2'>đây</a> để trở lại trang trước.";
                        } 
                    }else{
                        $statusMsg = "Xin lỗi chúng tôi không thể upload file của bạn.\nNhấn vào <a href='cauhoi.php?dang=2'>đây</a> để trở lại trang trước.";
                    }
                }else{
                    $statusMsg = "Đơn của bạn đã được gửi đi rồi!\nNhấn vào <a href='cauhoi.php?dang=2'>đây</a> để trở lại trang trước.";
                }
            }else{
                $statusMsg = "Xin lỗi chỉ có file DOCX được gửi đi!\nNhấn vào <a href='cauhoi.php?dang=2'>đây</a> để trở lại trang trước.";
            }
        }else{
            $statusMsg = "Hãy chọn file để UPLOAD.\nNhấn vào <a href='cauhoi.php?dang=2'>đây</a> để trở lại trang trước.";
        }
    }
        // Display status message
        echo $statusMsg;
    }
}
    
?>

