<?php
        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName     = "db_qlnk";
        require("send_email.php");
        
        // Create database connection
        $conn =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);//tương đương sql_connect

        // Check connection
        if (!$conn) {//truy cập thuộc tính phương thức của 1 đối tượng trong php
            die("Connection failed: " .mysqli_connect_error());
        }
        $madon = strtoupper(substr(md5(rand()), 0, 9));
        $conganxa = "Phú Yên";
        $type = $_POST['type'];
        $fullname=$_POST['fullname'];
        $address=$_POST['address'];
        $address_now=$_POST['address_now'];
        $birthday = $_POST['birthday'];
        // $gender = $_POST['gender'];
        $idcard = $_POST['idcard'];
        $idcard_address= $_POST['idcard_address'];
        $idcard_date= $_POST['idcard_date'];
        // $number = $_POST['number'];
        $email = $_POST['email'];
        $other = $_POST['other'];
        $feedback = $_POST['feedback'];
    

        if($type == 'TamTru') {
            $sql = "INSERT INTO tb_tamtru (ma_dontt, conganxa, hoten,ngaysinh,cccd,cccd_noicap,cccd_capngay,diachithuongtru,choohiennay,lydo,email, xacnhan, phanhoi) 
                     VALUES ('$madon','$conganxa','$fullname','$birthday','$idcard','$idcard_address','$idcard_date','$address','$address_now','$other','$email', 0, '$feedback')"; 
                    $subject = "[Xã Phú Yên] Thủ tục tạm trú của bạn đã được gửi đi!";
                    $body = "Việc thực hiện tạo thủ tục tạm trú trực tuyến của bạn đã hoàn tất và chờ được xác nhận. Mã đơn của bạn là: ".$madon.". Xem thông tin chi tiết về thủ tục <a href='http://localhost/BTL_QLNK/taixuong.php?madon={$madon}'>tại đây.</a>";
                    sendemailforAccount($email, $subject, $body);
        }
        else {
            $sql = "INSERT INTO tb_tamvang (ma_dontv, conganxa, hoten,ngaysinh,cccd,cccd_noicap,cccd_capngay,diachithuongtru,choohiennay,lydo,email, xacnhan, phanhoi) 
               VALUES ('$madon','$conganxa','$fullname','$birthday','$idcard','$idcard_address','$idcard_date','$address','$address_now','$other','$email', 0, '$feedback')";
               $subject = "[Xã Phú Yên] Thủ tục tạm vắng của bạn đã được gửi đi!";
               $body = "Việc thực hiện tạo thủ tục tạm vắng trực tuyến của bạn đã hoàn tất và chờ được xác nhận. Mã đơn của bạn là: ".$madon.". Xem thông tin chi tiết về thủ tục <a href='http://localhost/BTL_QLNK/taixuong.php?madon={$madon}'>tại đây.</a>";
               sendemailforAccount($email, $subject, $body);
        }
        
        $result = mysqli_query($conn,$sql);

        if($result) {
            $done = "Gửi thủ tục thành công. Hãy truy cập hòm thư để biết thêm chi tiết!";
            header("location: khaibaoOnline.php?dang=1&done=$done");
        }
        
    
?>

