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
        $number = $_POST['number'];
        $email = $_POST['email'];
        $content = $_POST['content'];
        $date = date('d/m/Y');
        echo $date;
        echo $content;

        
        $sql = "INSERT INTO tb_cauhoi (hoten,lydo,email,sdt,ngayhoi,loaicauhoi) 
                VALUES ('$fullname','$content','$email','$number','$date','$type')"; 
        
        
        $result = mysqli_query($conn,$sql);

        if($result) {
            header("location: ChuyenKhau.php");
        }
        
    
?>

