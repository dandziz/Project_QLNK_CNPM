//tìm kiếm mã thủ tục
$(document).ready(function(){
    $("#searchTT").click(function(){
        var madon = $("#madon").val();
        if(madon!=""){
            let form_datas = new FormData();
            form_datas.append('madon',madon);
            $.ajax({
                url: 'views/ThuTuc/tmp-taixuong.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#info-thutuc").html(res);
                }
            });
            return false;
        }else{

        }
    })
})
//gửi câu hỏi
// $(document).ready(function(){
//     $("#type").click(function(){
//         var lch = $("#type").val();
//         if(lch!=""){
//             let form_datas = new FormData();
//             form_datas.append('lch',lch);
//             $.ajax({
//                 url: 'tmp-phanloaicauhoi.php', // gửi đến file upload.php 
//                 dataType: 'text',
//                 cache: false,
//                 contentType: false,
//                 processData: false,
//                 data: form_datas,
//                 type: 'post',
//                 success: function(res) {
//                     $("#hdch").html(res);
//                 }
//             });
//             return false;
//         }else{

//         }
//     })
// })
//
$(document).ready(function(){
    $("#type").click(function(){
        var lch = $("#type").val();
        if(lch=="2"){
            $("#content").val("");
            $("#form-cauhoi").show();
            $("#form-file").show();
            $("#form-lydo").hide();
        }else if(lch=="1"){
            $("#content").val("");
            $("#form-cauhoi").show();
            $("#form-lydo").show();
            $("#form-file").hide();
        }else{
            $("#content").val("");
            $("#form-cauhoi").hide();
            $("#form-lydo").hide();
            $("#form-file").hide();
        }
    })
})
$(document).ready(function(){
    var lch = $("#type").val();
    if(lch=="2"){
        $("#content").val("");
        $("#form-cauhoi").show();
        $("#form-file").show();
        $("#form-lydo").hide();
    }else if(lch=="1"){
        $("#content").val("");
        $("#form-cauhoi").show();
        $("#form-lydo").show();
        $("#form-file").hide();
    }else{
        $("#content").val("");
        $("#form-cauhoi").hide();
        $("#form-lydo").hide();
        $("#form-file").hide();
    }
})
