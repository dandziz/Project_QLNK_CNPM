$(document).ready(function(){
    $("#searchSHK").click(function(){
        var mashk = $("#mashk").val();
        if(mashk!=""){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            $.ajax({
                url: 'process-searchSHK.php', // gửi đến file upload.php 
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
    $("#searchShkTk").click(function(){
        var mashk = $("#mashkTk").val();
        if(mashk!=""){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            $.ajax({
                url: 'search-tachkhau.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#selectND").html(res);
                }
            });
            return false;
        }else{

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
        if(mashk!="" && mashk != $("#mashkcu").text()){
            let form_datas = new FormData();
            form_datas.append('mashk',mashk);
            $.ajax({
                url: 'check-mashk.php', // gửi đến file upload.php 
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
        if($(".check-shk").text()!="Sổ hộ khẩu không tồn tại hoặc trùng khớp!"){
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
                url: 'tmp-doichuho.php', // gửi đến file upload.php 
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
            $("#info-checkSHK").html("<small class='check-shk' style='color:red;'>Sổ hộ khẩu không tồn tại hoặc trùng khớp!</small>");
        }
    })
})
//