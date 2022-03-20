<?php
session_start();
require_once 'models/CongAnXaModel.php';
require_once 'models/Model.php';
if(isset($_SESSION['LoginOK'])){
class CongAnXaController
{
    function index()
    {
        $model = new CongAnXaModel();
        $result = $model->getALLElement('sohokhau');
        $cax = $model->getCongAnXa($_SESSION['LoginOK']);
        require_once 'views/CongAnXa/index.php';
    }
    function quanlyshk()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_GET['mashk'])) {
            $ma_shk = $_GET['mashk'];
            $cax = $model->getCongAnXa($_SESSION['LoginOK']);
            require_once 'views/CongAnXa/quanLySHK.php';
        } else {
            header("location: views/CongAnXa/index.php");
        }
    }
    function themthanhvien()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_GET['mashk'])) {
            $ma_shk = $_GET['mashk'];
        }
        if (isset($_POST['btnSubmitAddMSHK'])) {
            $cccd = $_POST['cccd'];
            $chuho = 0;
            $quanhech = $_POST['quanhech'];
            $hoten = $_POST['hoten'];
            $hotenkhac = $_POST['hotenkhac'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $nguyenquan = $_POST['nguyenquan'];
            $dantoc = $_POST['dantoc'];
            $tongiao = $_POST['tongiao'];
            $quoctich = $_POST['quoctich'];
            $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviec'];
            $noithuongtrutruocday = $_POST['noithuongtrutruocday'];
            $canbodangky = $_POST['canbodangky'];
            $ThemTV = [
                'cccd' => $cccd,
                'chuho' => $chuho,
                'quanhech' => $quanhech,
                'hoten' => $hoten,
                'hotenkhac' => $hotenkhac,
                'ngaysinh' => $ngaysinh,
                'gioitinh' => $gioitinh,
                'nguyenquan' => $nguyenquan,
                'dantoc' => $dantoc,
                'tongiao' => $tongiao,
                'quoctich' => $quoctich,
                'nghenghiepnoilamviec' => $nghenghiepnoilamviec,
                'noithuongtrutruocday' => $noithuongtrutruocday,
                'ma_taikhoan' => $canbodangky,
                'ma_shk' => $ma_shk
            ];
            $isInsert = $model->insertTV($ThemTV);
            if ($isInsert) {
                $success = "Thêm thành viên thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk={$ma_shk}&done=$success");
            } else {
                $success = "Thêm thành viên không thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk={$ma_shk}&done=$success");
            }
        }
        require_once("views/CongAnXa/themThanhVien.php");
    }
    function checkcccd()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_POST['cccd'])) {
            $return = $m->getONE($_POST['cccd'], 'cccd', 'thanhvienshk');
            if ($return != false) {
                echo "<span id='message-checkcccd' style='color:red'>Căn cước công dân đã tồn tại hoặc không hợp lệ!</span>";
            } else {
                echo "<span id='message-checkcccd' style='color:green'>Căn cước công dân hợp lệ!</span>";
            }
        }
    }
    function checkmashk()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_POST['cccd']) && isset($_POST['mashk'])) {
            $return = $m->getONE($_POST['mashk'], 'ma_shk', 'sohokhau');
            if ($return != false) {
                $ngchuyen = $m->getONE($_POST['cccd'], 'cccd', 'thanhvienshk');
                if ($ngchuyen['ma_shk'] == $return['ma_shk']) {
                    echo "<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>";
                } else {
                    echo "<small class='check-shk' style='color: green;'>Sổ hộ khẩu hợp lệ!</small>";
                }
            } else {
                echo "<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>";
            }
        }
    }
    function checkmashkfortachkhau()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_POST['mashk'])) {
            $return = $m->getONE($_POST['mashk'], 'ma_shk', 'sohokhau');
            if ($return != false) {
                echo "<small id='message-checkshk' style='color:red;'>Sổ hộ khẩu đã tồn tại!</small>";
            } else {
                echo "<small id='message-checkshk' style='color: green;'>Sổ hộ khẩu hợp lệ!</small>";
            }
        }
    }
    function suathongtin()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_GET['cccd'])) {
            $cccd = $_GET['cccd'];
            $rowinfoshk = $m->getONE($cccd, 'cccd', 'thanhvienshk');
        }
        if (isset($_POST['smUpdateshk'])) {
            $cccd = $_POST['cccdupdate'];
            $ma_taikhoan = $_POST['canbodangky'];
            $hotenupdate = $_POST['hotenupdate'];
            $hotenkhacupdate = $_POST['hotenkhacupdate'];
            $quanhechupdate = $_POST['quanhechupdate'];
            $ngaysinhupdate = $_POST['ngaysinhupdate'];
            $gioitinhupdate = $_POST['gioitinhupdate'];
            $nguyenquanupdate = $_POST['nguyenquanupdate'];
            $dantocupdate = $_POST['dantocupdate'];
            $tongiaoupdate = $_POST['tongiaoupdate'];
            $quoctichupdate = $_POST['quoctichupdate'];
            $nghenghiepnoilamviecupdate = $_POST['nghenghiepnoilamviecupdate'];
            $noithuongtrutruocdayupdate = $_POST['noithuongtrutruocdayupdate'];
            $row = $m->getONE($cccd, 'cccd', 'thanhvienshk');
            $ma_shk = $row['ma_shk'];
            $SuaTV = [
                'cccd' => $cccd,
                'quanhech' => $quanhechupdate,
                'hoten' => $hotenupdate,
                'hotenkhac' => $hotenkhacupdate,
                'ngaysinh' => $ngaysinhupdate,
                'gioitinh' => $gioitinhupdate,
                'nguyenquan' => $nguyenquanupdate,
                'dantoc' => $dantocupdate,
                'tongiao' => $tongiaoupdate,
                'quoctich' => $quoctichupdate,
                'nghenghiepnoilamviec' => $nghenghiepnoilamviecupdate,
                'noithuongtrutruocday' => $noithuongtrutruocdayupdate,
                'ma_taikhoan' => $ma_taikhoan
            ];
            $isUpdateTV = $model->updateTV($SuaTV);
            if ($isUpdateTV) {
                $success = "Sửa thông tin thành viên thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            } else {
                $success = "Sửa thông tin thành viên không thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            }
        }
        require_once("views/CongAnXa/suaThongTin.php");
    }
    function tachkhau()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        $count = 0;
        if (isset($_POST['btnSubmitTachSHK'])) {
            $ma_shk = $_POST['mashk'];
            $hotenchuho = $_POST['hotenchuho'];
            $noithuongtru = $_POST['noithuongtru'];
            $ngaycap = $_POST['ngaycap'];
            $canbodangkya = $_POST['canbodangkya'];
            $thanhpho = $_POST['thanhpho'];
            $cccd = $_POST['cccd'];
            $row = $m->getONE($cccd, 'cccd', 'thanhvienshk');
            $hoten = $_POST['hoten'];
            $hotenkhac = $_POST['hotenkhac'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $nguyenquan = $_POST['nguyenquan'];
            $dantoc = $_POST['dantoc'];
            $tongiao = $_POST['tongiao'];
            $quoctich = $_POST['quoctich'];
            $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviec'];
            $noithuongtrutruocday = $_POST['noithuongtrutruocday'];
            $canbodangkyb = $_POST['canbodangkyb'];
            $AddSHK = [
                'ma_shk' => $ma_shk,
                'hotenchuho' => $hotenchuho,
                'noithuongtru' => $noithuongtru,
                'ngaycap' => $ngaycap,
                'ma_taikhoan' => $canbodangkya,
                'thanhpho' => $thanhpho
            ];
            $isAddSHK = $model->insertSHK($AddSHK);
            if ($isAddSHK) {
                $count++;
            }
            $UpdateTV = [
                'ma_shk' => $ma_shk,
                'cccd' => $cccd,
                'hoten' => $hoten,
                'hotenkhac' => $hotenkhac,
                'ngaysinh' => $ngaysinh,
                'gioitinh' => $gioitinh,
                'nguyenquan' => $nguyenquan,
                'dantoc' => $dantoc,
                'tongiao' => $tongiao,
                'quoctich' => $quoctich,
                'nghenghiepnoilamviec' => $nghenghiepnoilamviec,
                'noithuongtrutruocday' => $noithuongtrutruocday,
                'ma_taikhoan' => $canbodangkyb
            ];
            $isUpdateTVTK = $model->updateTVTK($UpdateTV);
            if ($isUpdateTVTK) {
                $count++;
            }
            if ($count == 2) {
                $success = "Tách khẩu thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            } else {
                $success = "Tách khẩu không thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk={$row['ma_shk']}&cccd={$row['cccd']}");
            }
        }
        require_once("views/CongAnXa/tachKhau.php");
    }
    function gothanhvien()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_GET['cccd']) && isset($_SESSION['LoginOK'])) {
            $cccd = $_GET['cccd'];
            $ma_shk = $_GET['mashk'];
            $isDeleteTV = $model->deleteTV($cccd);
            if ($isDeleteTV) {
                $success = "Gỡ thành viên khỏi sổ hộ khẩu thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            } else {
                $success = "Gỡ thành viên khỏi sổ hộ khẩu không thành công!!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            }
        }
    }
    function chuyenkhau()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_GET['cccd'])) {
            $cccd = $_GET['cccd'];
            $rownc = $m->getONE($cccd, 'cccd', 'thanhvienshk');
            $resultcb = $m->getALLElement('taikhoan');
        }
        if (isset($_POST['smUpdateshk'])) {
            $ma_shk = $_POST['mashk-check'];
            $quanhech = $_POST['quanhech'];
            $hoten = $_POST['hoten'];
            $hotenkhac = $_POST['hotenkhac'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $nguyenquan = $_POST['nguyenquan'];
            $dantoc = $_POST['dantoc'];
            $tongiao = $_POST['tongiao'];
            $quoctich = $_POST['quoctich'];
            $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviec'];
            $noithuongtrutruocday = $_POST['noithuongtrutruocday'];
            $ma_taikhoan = $_POST['canbodangky'];
            $cccd = $_POST['cccdupdate'];
            $ChuyenTV = [
                'ma_shk' => $ma_shk,
                'cccd' => $cccd,
                'quanhech' => $quanhech,
                'hoten' => $hoten,
                'hotenkhac' => $hotenkhac,
                'ngaysinh' => $ngaysinh,
                'gioitinh' => $gioitinh,
                'nguyenquan' => $nguyenquan,
                'dantoc' => $dantoc,
                'tongiao' => $tongiao,
                'quoctich' => $quoctich,
                'nghenghiepnoilamviec' => $nghenghiepnoilamviec,
                'noithuongtrutruocday' => $noithuongtrutruocday,
                'ma_taikhoan' => $ma_taikhoan
            ];
            $isChangeTV = $model->changeTV($ChuyenTV);
            if ($isChangeTV) {
                $success = "Chuyển khẩu thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            } else {
                $success = "Chuyển khẩu không thành công!!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            }
        }
        require_once("views/CongAnXa/chuyenKhau.php");
    }
    function doichuho()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        if (isset($_GET['mashk'])) {
            $ma_shk = $_GET['mashk'];
            $sql = "Select* from thanhvienshk where ma_shk = '$ma_shk' and chuho = 1";
            $resultch = mysqli_query($m->connectDb(), $sql);
            $rowch = mysqli_fetch_assoc($resultch);
            $cccdch = $rowch['cccd'];
            $hotench = $rowch['hoten'];
            $result = $m->getALL($ma_shk, 'ma_shk', 'thanhvienshk');
        }
        if(isset($_POST['btnDoiChuHo'])){
            $cccdchnew = $_POST['cccdchnew'];
            $ma_shk = $_POST['mashk'];
            $count = 0;
            $chuhonew = $m->getONE($cccdchnew,'cccd','thanhvienshk');
            $isUpdate1 = $model->updateCHNew($cccdchnew);
            if($isUpdate1){
                $count++;
            }
            $resultAll = $m->getALL($ma_shk,'ma_shk','thanhvienshk');
            for($i = 0; $i < count($resultAll); $i++){
                $rowAll = $resultAll[$i];
                if($rowAll['cccd']!=$cccdchnew){
                    $quanhech = $_POST['quanhechuho'.$rowAll['cccd']];
                    $isUpdatex = $model->updateDoiChuHo($quanhech, $rowAll['cccd']);
                    if($isUpdatex){
                        $count++;
                    }
                }
            }
            if($count==count($resultAll)){
                $hotenchuho = $chuhonew['hoten'];
                $isUpdate2 = $model->updateSHK($hotenchuho, $ma_shk);
                if($isUpdate1){
                    $success = "Đổi chủ hộ thành công!";
                    header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
                }else{
                    $success = "Đổi chủ hộ không thành công!";
                    header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
                }
            }else{
                $success = "Đổi chủ hộ không thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            }
        }
        require_once("views/CongAnXa/doiChuHo.php");
    }
    function tmpdoichuho()
    {
        $m = new Model();
        if (isset($_POST['cccd'])) {
            $cccd = $_POST['cccd'];
            if ($cccd != 'x') {
                $result = $m->getALL($cccd, "cccd", "thanhvienshk");
                $row = $result[0];
                $resultall = $m->getALL($row['ma_shk'], "ma_shk", "thanhvienshk");
                for ($i = 0; $i < count($resultall); $i++) {
                    $rowi = $resultall[$i];
                    if ($rowi['cccd'] != $cccd) {
?>
                        <div>
                            <label for="validationCustom02" class="form-label">Thay đổi quan hệ với chủ hộ</label><br>
                            <label for="validationCustom02" class="form-label"><?php echo $rowi['hoten'] . ': ' . $rowi['cccd'] ?></label>
                            <input type="text" class="form-control" name="quanhechuho<?php echo $rowi['cccd'] ?>" required>
                            <hr>
                        </div>
<?php
                    }
                }
                ?>
                <div class="mt-3 d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit" id="smUpdateshk" name="btnDoiChuHo" onclick="return confirm('Bạn chắc chắn muốn chuyển đổi chủ hộ?')">Xác Nhận Đổi</button>
                </div>
                <?php
            }
        }
    }
    function themhokhau()
    {
        $model = new CongAnXaModel();
        $m = new Model();
        $resultca = $m->getALLElement('taikhoan');
        if(isset($_POST['btnSubmitAddSHK'])){
            $ma_shk = $_POST['mashk'];
            $hotenchuho = $_POST['hotenchuho'];
            $noithuongtru = $_POST['noithuongtru'];
            $ngaycap = $_POST['ngaycap'];
            $truongcongana = $_POST['truongcongana'];
            $thanhpho = $_POST['thanhpho'];
            $themSHK = [
                'ma_shk' => $ma_shk,
                'hotenchuho' => $hotenchuho,
                'noithuongtru' => $noithuongtru,
                'ngaycap' => $ngaycap,
                'ma_taikhoan' => $truongcongana,
                'thanhpho' => $thanhpho
            ];
            $isInsertSHK = $model->insertSHK($themSHK);
            $cccd = $_POST['cccd'];
            $hoten = $_POST['hoten'];
            $hotenkhac = $_POST['hotenkhac'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $nguyenquan = $_POST['nguyenquan'];
            $dantoc = $_POST['dantoc'];
            $tongiao = $_POST['tongiao'];
            $quoctich = $_POST['quoctich'];
            $nghenghiepnoilamviec = $_POST['nghenghiepnoilamviec'];
            $noithuongtrutruocday = $_POST['noithuongtrutruocday'];
            $canbodangky = $_POST['canbodangky'];
            $themCH = [
                'ma_shk' => $ma_shk,
                'cccd' => $cccd,
                'hoten' => $hoten,
                'hotenkhac' => $hotenkhac,
                'ngaysinh' => $ngaysinh,
                'gioitinh' => $gioitinh,
                'nguyenquan' => $nguyenquan,
                'dantoc' => $dantoc,
                'tongiao' => $tongiao,
                'quoctich' => $quoctich,
                'nghenghiepnoilamviec' => $nghenghiepnoilamviec,
                'noithuongtrutruocday' => $noithuongtrutruocday,
                'ma_taikhoan' => $canbodangky
            ];
            $isInsertCH = $model->insertChuHo($themCH);
            if($isInsertSHK&&$isInsertCH){
                $success = "Thêm sổ hộ khẩu thành công!";
                header("location: index.php?controller=CongAnXa&action=quanlyshk&mashk=$ma_shk&done=$success");
            }else{
                $error = "Lỗi thêm sổ hộ khẩu";
                header("location: index.php?controller=CongAnXa&action=themhokhau&error=$error");
            }
        }
        require_once("views/CongAnXa/themHoKhau.php");
    }
}
}else{
    header("location: index.php");
}
?>