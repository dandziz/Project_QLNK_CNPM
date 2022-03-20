<?php
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_qlnk';
if ($_POST['madon']) {
    $madon = $_POST['madon'];
    require_once("../../models/Model.php");
    $ps = new Model();
    $resultTT = $ps->getONE($madon, 'ma_dontt', 'tamtru');
    $resultTV = $ps->getONE($madon, 'ma_dontv', 'tamvang');
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
                $ngaybatdau = $ps->getDate($resultTT['ngaybatdau']);
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
                $ngaybatdau = $ps->getDate($resultTV['ngaybatdau']);
            }else{
                $xacnhan = "Đang chờ phê duyệt";
            }
        }
?>
        <h5 class="text-center">THÔNG TIN THỦ TỤC <?php echo $loaitt ?> <?php echo $madon ?></h5>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">HỌ TÊN: </span><span class="fw-bold fs-6"><?php echo $hoten ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">NGÀY SINH: </span><span class="fw-bold fs-6"><?php echo $ps->getDate($ngaysinh) ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">CCCD: </span><span class="fw-bold fs-6"><?php echo $cccd ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">NƠI CẤP CCCD: </span><span class="fw-bold fs-6"><?php echo $cccd_noicap ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">NGÀY CẤP CCCD: </span><span class="fw-bold fs-6"><?php echo $ps->getDate($cccd_capngay) ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">ĐỊA CHỈ THƯỜNG TRÚ: </span><span class="fw-bold fs-6"><?php echo $diachithuongtru ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">CHỖ Ở HIỆN NAY: </span><span class="fw-bold fs-6"><?php echo $choohiennay ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">NGÀY BẮT ĐẦU: </span><span class="fw-bold fs-6"><?php echo $ngaybatdau ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">LÝ DO: </span><span class="fw-bold fs-6"><?php echo $lydo ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">EMAIL: </span><span class="fw-bold fs-6"><?php echo $email ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">CÁCH NHẬN THỦ TỤC: </span><span class="fw-bold fs-6"><?php echo $phanhoi ?></span>
        </div>
        <div class="border-bottom d-flex justify-content-between mt-2 pb-2">
            <span class="fw-bold fs-6">TRẠNG THÁI: </span><span class="fw-bold fs-6"><?php echo $xacnhan ?></span>
        </div>
        <?php
        if($xacnhan=="Đã xác nhận"){
            $link = "#";
            if(!file_exists("../../tailieu/template".$madon.".docx")){
                require_once("xuattailieu.php");
            }else{
                $link = "tailieu/template".$madon.".docx";
            }
        ?>
        <div class="border-bottom d-flex justify-content-center mt-2 pb-2">
            <a class="fw-bold fs-6 text-decoration-none" href="<?php echo $link ?>" style="cursor: pointer">Tải Xuống Thủ Tục</a>
        </div>
        <div class="demo">

        </div>
        <?php
        }
        ?>
<?php
    } else {
        echo "<p class='fs-bold fs-3'>Không tìm thấy thủ tục này</p>";
    }
} else {
    header("location: index.php");
}
?>
<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "xuattailieu.php", true);
  xhttp.send();
}
</script>