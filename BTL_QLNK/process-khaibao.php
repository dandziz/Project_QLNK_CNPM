<?php
        $dbHost     = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName     = "db_qlnk";
        
        // Create database connection
        $conn =  mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);//tương đương sql_connect

        // Check connection
        if (!$conn) {//truy cập thuộc tính phương thức của 1 đối tượng trong php
            die("Connection failed: " .mysqli_connect_error());
        }

        $type = $_POST['type'];
        $fullname=$_POST['fullname'];
        $address=$_POST['address'];
        $address_now=$_POST['address_now'];
        $birthday = $_POST['birthday'];
        $gender = $_POST['gender'];
        $idcard = $_POST['idcard'];
        $idcard_address= $_POST['idcard_address'];
        $idcard_date= $_POST['idcard_date'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $other = $_POST['other'];
        $feedback = $_POST['feedback'];
    

        if($type == 'TamTru') {
            $sql = "INSERT INTO tb_tamtru (hoten,ngaysinh,cccd,cccd_noicap,cccd_capngay,diachithuongtru,choohiennay,lydo,email,phanhoi) 
                     VALUES ('$fullname','$birthday','$idcard','$idcard_address','$idcard_date','$address','$address_now','$other','$email','$feedback')"; 
        }
        else {
            $sql = "INSERT INTO tb_tamvang (hoten,ngaysinh,cccd,cccd_noicap,cccd_capngay,diachithuongtru,choohiennay,lydo,email,phanhoi) 
               VALUES ('$fullname','$birthday','$idcard','$idcard_address','$idcard_date','$address','$address_now','$other','$email','$feedback')";
        }
        
        $result = mysqli_query($conn,$sql);

        if($result) {
            $message = 'true';
        }
        else {
            $message = 'false';
        }
        header("location: khaibaoOnline.php?notice=$message");
        
    
?>

