$('document').ready(function ($) {
            $('.upload').upload({
        action: '/admin/upload',
        label: 'Перетащите файл или кликните для выбора',
        postKey: 'newfile',
        maxQueue: 1,
//        postData: {data2: $('#my_select option:selected').val()},
        maxSize: 300485760
    }).on("start.upload", Start)
            .on("filestart.upload", fileStart)
            .on("fileprogress.upload", fileProgress)
            .on("filecomplete.upload", filePComplelele)
            .on("fileerror.upload", fileError)
            .on("complete.upload", Complete);
    });
            
           
//   $("#my_select").change(function(){
//            var data = $(this).val();
//            console.log(data);
//        });   
//var data  = $('#my_select').val();
//    console.log(data);

//var data = $('#my_select option:selected').val();



function Start(e, files) {
    console.log("Start");
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
            dataType: "html",
            beforeSend: funcBefore,
            success: funcSuccess
        });
   
    console.log('FIle Start');
    $("#res").find('li[data-index=' + file.index + ']').find('.progress').text('0%');
}
function fileProgress(e, file, percent) {
    console.log('FIle Progress');
    $("#res")
            .find('li[data-index=' + file.index + ']')
            .find('progress').attr('value', percent)
            .next().text(percent + '%');
}
function filePComplelele(e, file, response) {
        console.log('FIle Complete');
    if (response == '' || response.toLowerCase() == 'error') {
        $("#res").find('li[data-index=' + file.index + ']')
                .addClass('upload_error')
                .find('.progress')
                .text('Ошибка загрузки');
    } else {
        $("#res").find('li[data-index=' + file.index + ']')
                .addClass('upload_ok')
                .find('.progress')
                .text('Загружено');
    }
}
function fileError(e, file) {

    console.log('Error');
    $("#res").find('li[data-index=' + file.index + ']')
            .addClass('upload_error')
            .find('.progress')
            .text('Файл не поддерживается');
}

function Complete(e) {

//var data = $('#my_select option:selected').val();
//    console.log(data);
}
function funcBefore() {
    $('#info').text('Ожидание данных...');
}
function funcSuccess(data) {
    $('#info').text("Заввершено");
}
