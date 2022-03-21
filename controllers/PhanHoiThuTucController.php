<?php
session_start();
require_once 'models/PhanHoiThuTucModel.php';
require_once 'models/Model.php';
require_once("send_email.php");
if(isset($_SESSION['LoginOK'])){
    class PhanHoiThuTucController
    {
        function index()
        {
            $model = new PhanHoiThuTucModel();
            $tamtru = $model->getThuTucTamTru();
            $model = new PhanHoiThuTucModel();
            require_once 'views/PhanHoiThuTuc/index.php';
        }
        function timkiemthutuc(){
            $model = new PhanHoiThuTucModel();
            if(isset($_POST['loai'])){
                if($_POST['loai']=="tamtru"){
                    $tamtru = $model->getThuTucTamTru();
                    if($tamtru!=false){
                    for($i = 0; $i < count($tamtru); $i++){
                        $row = $tamtru[$i];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i?></th>
                            <th><?php echo $row['ma_dontt'] ?></th>
                            <th><?php echo $row['hoten'] ?></th>
                            <th><?php echo $row['cccd'] ?></th>
                            <th><?php echo $row['diachithuongtru'] ?></th>
                            <th><?php echo $row['phanhoi'] ?></th>
                            <td><a href="pheDuyet-chitiet.php?id=${response.ma_dontt}&type=${value}">Xem chi tiết</a></td>   
                        </tr>
                        <?php
                    }
                }
                }else{
                    $tamvang = $model->getThuTucTamVang();
                    if($tamvang!=false){
                    for($i = 0; $i < count($tamvang); $i++){
                        $row = $tamvang[$i];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i?></th>
                            <th><?php echo $row['ma_dontv'] ?></th>
                            <th><?php echo $row['hoten'] ?></th>
                            <th><?php echo $row['cccd'] ?></th>
                            <th><?php echo $row['diachithuongtru'] ?></th>
                            <th><?php echo $row['phanhoi'] ?></th>
                            <td><a href="pheDuyet-chitiet.php?id=${response.ma_dontt}&type=${value}">Xem chi tiết</a></td>   
                        </tr>
                        <?php
                    }
                }
                }
            }
        }
        function chitiet(){
            $model = new PhanHoiThuTucModel();
            if(isset($_GET['type'])&& isset($_GET['id'])){
                $type = $_GET['type'];
                $id = $_GET['id'];
            }
            if($type == 'tamtru') {
                $result = $model->getChiTietTamTru($id);
            }
            else {
                $result = $model->getChiTietTamVang($id);
            }
            require_once("views/PhanHoiThuTuc/chiTiet.php");
        }
        function phanhoi(){
            $model = new PhanHoiThuTucModel();
            if(isset($_POST['btnSubmit'])){
                $id = $_POST['id'];
                $email = $_POST['email'];
                $phanloai = $_POST['phanloai'];
                $pheduyet = $_POST['pheduyet'];
            }
            if(isset($_POST['btnSubmitPH'])){
                $id = $_POST['mathutuc'];
                $email = $_POST['email'];
                $title = $_POST['title'];
                $content = $_POST['content'];
                $pheduyet = $_POST['pheduyet'];
                $ma_taikhoan = $_POST['mataikhoan'];
                $type = $_POST['type'];
                // echo $id.' '.$email.' '.$title.' '.$content.' '.$pheduyet.' '.$ma_taikhoan;
                if($pheduyet=="yes"){
                    $xacnhan = 1;
                }else{
                    $xacnhan = 2;
                }
                $pd = [
                    'matt' => $id,
                    'xacnhan' => $xacnhan,
                    'ma_taikhoan' => $ma_taikhoan
                ];
                if($type=="Thủ tục tạm vắng"){
                    $isTV = $model->processTV($pd);
                    if($isTV){
                        $subject = $title;
                        $body = $content;
                        sendemailforAccount($email, $subject, $body);
                        $done = "Phê duyệt thành công!";
                        header("location: index.php?controller=PhanHoiThuTuc&action=index&done=$done");
                    }else{
                        $done = "Phê duyệt không thành công!";
                        header("location: index.php?controller=PhanHoiThuTuc&action=index&done=$done");
                    }
                }else{
                    $isTT = $model->processTT($pd);
                    if($isTT){
                        $subject = $title;
                        $body = $content;
                        sendemailforAccount($email, $subject, $body);
                        $done = "Phê duyệt thành công!";
                        header("location: index.php?controller=PhanHoiThuTuc&action=index&done=$done");
                    }else{
                        $done = "Phê duyệt không thành công!";
                        header("location: index.php?controller=PhanHoiThuTuc&action=index&done=$done");
                    }
                }
            }
            require_once("views/PhanHoiThuTuc/phanHoi.php");
        }
    }
}else{
    header("location: index.php");
}
?>