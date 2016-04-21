$('document').ready(function ($) {
            $('.upload').upload({
        action: '/admin/upload',
        label: 'Перетащите файл или кликните для выбора',
        postKey: 'newfile',
        maxQueue: 1,
        maxSize: 300485760
    }).on("start.upload", Start)
            .on("filestart.upload", fileStart)
            .on("fileprogress.upload", fileProgress)
            .on("filecomplete.upload", filePComplelele)
            .on("fileerror.upload", fileError);
            
    });

function Start(e, files) {
    var html = '';
    for (var i = 0; i < files.length; i++) {
        if (files[i].size > 300485760) {
            alert("Size");
        }
        html += '<li class="qwe" data-index="' + files[i].index + '"><span class="file">' + files[i].name + '</span><progress value="0" max="100"></progress><span class="progress"></span></li>'
    }
    $("#res").append(html);
    
}
function fileStart(e, file) {
        $.ajax({
            url: "/admin/upload",
            type: "POST",
            data: ({data: $("#my_select option:selected").val()}),
            dataType: "html"
        });
    $("#res").find('li[data-index=' + file.index + ']').find('.progress').text('0%');
}
function fileProgress(e, file, percent) {
    $("#res")
            .find('li[data-index=' + file.index + ']')
            .find('progress').attr('value', percent)
            .next().text(percent + '%');
}
function filePComplelele(e, file, response) {
    if (response == '' || response.toLowerCase() == 'error') {
        $("#res").find('li[data-index=' + file.index + ']')
                .addClass('upload_error')
                .find('.progress')
                .text('Ошибка загрузки');
    } else {
        $("#res").find('li[data-index=' + file.index + ']')
                .addClass('upload_ok')
                .find('.progress');
    }
}
function fileError(e, file) {
    $("#res").find('li[data-index=' + file.index + ']')
            .addClass('upload_error')
            .find('.progress')
            .text('Файл не поддерживается');
}
// ####################################################################
// Выделить все checkbox
$(document).ready(function(){
    $("#check_all").on('click',function () {
        if (!$("#check_all").is(":checked"))
            $(".checkbox").removeAttr("checked");
        else
            $(".checkbox").prop("checked","checked");
    });
// При выборе checkbox показать кнопку удалить
    $("#delete_select").hide();

    
    $(".checkbox").click(function () {
        if (!$(".checkbox").is(":checked")) 
            $("#delete_select").hide();
        else
             $("#delete_select").show();
    });
 
    $('#delete_select').click(function(){
        $.ajax({
            type: 'POST',
            url: '/admin/category/delete',
            dataType: "html",
            data: ({data: 18}),
            cache: false,
            // success: ShowMessage
        });
    });
  });
  