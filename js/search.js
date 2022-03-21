/*
$(document).ready(function() {
    $('#type-input').change(function() {
        var value = $(this).val();
        $('#submit').click(function() {
            $.ajax({
                url: "/QLNK/Project_QLNK_CNPM/process-timKiemTaiLieu.php",
                type: 'POST', 
                data: {type: value},
                dataType: 'array',
                success: function(response) {
                    console.log(value);
                    var html='';
                    if(value === 'tamtru'){
                        html = `
                            <tr>
                                <th scope="row"></th>
                                <th>${response.hoten}</th>
                                <th>${response.cccd}</th>
                                <th>${response.choohiennay}</th>
                                <th>${response.phanhoi}</th>
                                <td><a href="pheDuyet-chitiet.php?id=${response.ma_dontt}&type=${value}">Xem chi tiết</a></td>   
                            </tr>
                        `;//Chưa xong chỗ thẻ a
                    }
                    else if(value === 'tamvang') {
                        html = `
                            <tr>
                                <th scope="row"></th>
                                <th>${response.hoten}</th>
                                <th>${response.cccd}</th>
                                <th>${response.choohiennay}</th>
                                <th>${response.phanhoi}</th>
                                <td><a href="pheDuyet-chitiet.php?id=${response.ma_dontv}&type=${value}">Xem chi tiết</a></td>   
                            </tr>
                        `;//Chưa xong chỗ thẻ a
                    }
                    $('#search-table__content').html(html);
                }
              })
        })
    })
})*/

$(document).ready(function(){
    $('#type-input').change(function() {
        var value = $(this).val();
        if(value!=""){
            let form_datas = new FormData();
            form_datas.append('loai',value);
            $.ajax({
                url: 'index.php?controller=PhanHoiThuTuc&action=timkiemthutuc', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_datas,
                type: 'post',
                success: function(res) {
                    $("#search-table__content").html(res);
                }
            });
            return false;
        }else{

        }
    })
})