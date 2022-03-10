<?php
if(isset($_POST['lch'])){
    if($_POST['lch']==1){
        ?>
        <h5>Note: Bạn có thể gửi các câu hỏi tới Công An Xã để xử lý như sai sót thông tin trong Sổ Hộ Khẩu hoặc không tải được thủ tục</h5>
        <?php
    }else if("lch"==2){

    }else{

    }
}else{
    header('location: index.php');
}
?>