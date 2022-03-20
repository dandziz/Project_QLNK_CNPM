$(document).ready(function(){
    $("#searchSHK").click(function(){
        var mashk = $("#mashk").val();
        if(mashk!=""){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            $.ajax({
                url: 'views/CongAnXa/tmp-searchSHK.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#allshk").html(res);
                }
            });
            return false;
        }else{

        }
    })
})
//tìm kiếm sổ hộ khẩu tách
$(document).ready(function(){
    $("#mashktk").change(function(){
        var mashk = $("#mashktk").val();
        if(mashk!=""){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            $.ajax({
                url: 'index.php?controller=CongAnXa&action=checkmashkfortachkhau', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $(".grmessage-checkshk").html(res);
                }
            });
            return false;
        }else{
            $(".grmessage-checkshk").html("<small class='check-shk' style='color:red;'>Sổ hộ khẩu đã tồn tại!</small>");
        }
    })
})
//tách khẩu
$(document).ready(function(){
    $("#tHTK").click(function(){
        var mashk = $("#mashkTk").val();
        var cccd = $("#nguoimuontach").val();
        if(mashk!=""){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            form_datas.append('cccd',cccd);
            console.log(mashk+cccd);
            $.ajax({
                url: 'tmp-tachkhau.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#formthongtin").html(res);
                }
            });
            return false;
        }else{

        }
    })
})
//Chuyển hộ khẩu
$(document).ready(function(){
    $("#button-checkSHK").click(function(){
        var mashk = $("#mashk-check").val();
        var cccd = $("#cccdupdate").val();
        if(mashk!="" && mashk != $("#mashkcu").text()){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            form_datas.append('cccd',cccd);
            $.ajax({
                url: 'index.php?controller=CongAnXa&action=checkmashk', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#info-checkSHK").html(res);
                }
            });
            return false;
        }else{
            $("#info-checkSHK").html("<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>");
        }
    })
})

function check_mashk(){
    if($("#mashk-check").val()!=""){
        if($(".check-shk").text()!="Sổ hộ khẩu không tồn tại hoặc trùng khớp!" && $(".check-shk").text()!=""){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function checkTK(){
    if($("#mashknew").val()!="" && $("#noithuongtru").val()!="" && $("#ngaycap").val()!="" && $("#truongcongana").val()!=""){
        return true;
    }else{
        alert("Hãy nhập đầy đủ thông tin cho sổ hộ khẩu!");
        return false;
    }
}
//đổi chủ hộ
$(document).ready(function(){
    $("#cccdchnew").change(function(){
        var cccd = $("#cccdchnew").val();
        if(cccd!=""){
            let form_datas = new FormData();
            form_datas.append('cccd',cccd);
            $.ajax({
                url: 'index.php?controller=CongAnXa&action=tmpdoichuho', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $(".tttv").html(res);
                }
            });
            return false;
        }else{
            // $("#info-checkSHK").html("<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>");
        }
    })
})
//check mã shk
$(document).ready(function(){
    $("#mashk").change(function(){
        var mashk = $("#mashk").val();
        if(mashk!=""){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            $.ajax({
                url: '../check-soshk/check-soshk.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $(".grmessage-checkshk").html(res);
                }
            });
            return false;
        }else{
            $("#info-checkSHK").html("<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>");
        }
    })
})
//check mã shk
$(document).ready(function(){
    $("#cccd").change(function(){
        var cccd = $("#cccd").val();
        if(cccd!=""){
            let form_datas = new FormData();
            form_datas.append('cccd',cccd);
            $.ajax({
                url: 'index.php?controller=CongAnXa&action=checkcccd', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $(".grmessage-checkcccd").html(res);
                }
            });
            return false;
        }else{
            $(".grmessage-checkcccd").html("<span id='message-checkcccd' style='color:red'>Căn cước công dân đã tồn tại hoặc không hợp lệ!</span>");
        }
    })
})
function checkaddshk(){
    if($('#message-checkshk').text()!="Sổ hộ khẩu hợp lệ!" || $('#message-checkcccd').text()!="Căn cước công dân hợp lệ!" ){
        alert("Thông tin chưa chính xác vui lòng nhập lại!");
        return false;
    }else if($('#hoten').val()!=$('#hotenchuho').val()){
        alert("Họ tên chủ hộ phải trùng khớp với nhau. Vui lòng nhập lại!");
        return false;
    }else{
        return true;
    }
}

function checkaddshk2(){
    if($('#message-checkshk').text()!="Sổ hộ khẩu hợp lệ!"){
        alert("Mã sổ hộ khẩu chưa chính xác vui lòng nhập lại!");
        return false;
    }else if($('#hoten').val()!=$('#hotenchuho').val()){
        alert("Họ tên chủ hộ phải trùng khớp với nhau. Vui lòng nhập lại!");
        return false;
    }else{
        return true;
    }
}
function checkaddshk3(){
    if($('#message-checkcccd').text()!="Căn cước công dân hợp lệ!"){
        alert("Thông tin chưa chính xác vui lòng nhập lại!");
        return false;
    }else{
        return true;
    }
}
//xem chi tiết câu hỏi
$(document).ready(function(){
    $(".xemchitiet").click(function(){
        var macauhoi = this.id;
        if(macauhoi!=""){
            let form_datas = new FormData();
            form_datas.append('ma_cauhoi',macauhoi);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=xemchitiet', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#infoquestion").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
//xem chi tiết phản hồi
$(document).ready(function(){
    $(".xemphanhoi").click(function(){
        var macauhoi = this.id;
        if(macauhoi!=""){
            let form_datas = new FormData();
            form_datas.append('ma_cauhoi',macauhoi);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=xemchitietphanhoi', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#infoquestion").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
//tìm kiếm câu hỏi
$(document).ready(function(){
    $("#searchCH").click(function(){
        var cauhoi = $("#cauhoi").val();
        if(cauhoi!=""){
            let form_datas = new FormData();
            form_datas.append('cauhoi',cauhoi);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=timkiemcauhoi', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#cauHoiCanGiaiDap").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
//tìm kiếm yêu cầu chuyển khẩu
$(document).ready(function(){
    $("#seachCK").click(function(){
        var chuyenkhau = $("#chuyenkhau").val();
        if(chuyenkhau!=""){
            let form_datas = new FormData();
            form_datas.append('chuyenkhau',chuyenkhau);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=timkiemchuyenkhau', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#chuyenKhauCanGiaiDap").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})
//tìm kiếm lưu trữ
$(document).ready(function(){
    $("#searchLuuTru").click(function(){
        var luutru = $("#luutru").val();
        if(luutru!=""){
            let form_datas = new FormData();
            form_datas.append('luutru',luutru);
            $.ajax({
                url: 'index.php?controller=PhanHoi&action=timkiemluutru', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#luuTruThongTin").html(res);
                }
            });
            return false;
        }else{
            
        }
    })
})