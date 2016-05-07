$(document).ready(function(){
    $.ajax({
            url: "/admin/upload",
            type: "POST",
            data: ({data: $("#my_select option:selected").val()}),
            dataType: "html",
          });
$('#my_select').change(function(){
    $.ajax({
            url: "/admin/upload",
            type: "POST",
            data: ({data: $("#my_select option:selected").val()}),
            dataType: "html",
          });
    });
});

$('#drag-and-drop-zone').dmUploader({
        url: '/admin/upload',
        dataType: 'html',
        allowedTypes: 'image/*',
        // extraData: {data: $('#sel option:selected').val()},
        // onInit: function(){
        //   $.danidemo.addLog('#demo-debug', 'default', 'Плагин правильно инициализирован');
        // },
        onBeforeUpload: function(id){
          // $.ajax({
          //   url: "upload1.php",
          //   type: "POST",
          //   data: ({data: $("#sel option:selected").val()}),
          //   dataType: "html",
          //      });
          // $.danidemo.addLog('#demo-debug', 'default', 'Начало загрузки №' + id);

          $.danidemo.updateFileStatus(id, 'default', 'Зарузка...');
        },
        onNewFile: function(id, file){
          $.danidemo.addFile('#demo-files', id, file);

          /*** Begins Image preview loader ***/
          if (typeof FileReader !== "undefined"){
            
            var reader = new FileReader();

            // Last image added
            var img = $('#demo-files').find('.demo-image-preview').eq(0);

            reader.onload = function (e) {
              img.attr('src', e.target.result);
            }

            reader.readAsDataURL(file);

          } else {
            // Hide/Remove all Images if FileReader isn't supported
            $('#demo-files').find('.demo-image-preview').remove();
          }
          /*** Ends Image preview loader ***/

        },
        // onComplete: function(){
        //   $.danidemo.addLog('#demo-debug', 'default', 'Все загрузки файлов завершены');
        // },
        onUploadProgress: function(id, percent){
          var percentStr = percent + '%';

          $.danidemo.updateFileProgress(id, percentStr);
        },
        onUploadSuccess: function(id, data){
          // $.danidemo.addLog('#demo-debug', 'success', 'Зарузка файла №' + id + ' завершена');

          // $.danidemo.addLog('#demo-debug', 'info', 'Ответ сервера для файла №' + id + ': ' + JSON.stringify(data));

          $.danidemo.updateFileStatus(id, 'success', 'Зарузка завершена!');

          $.danidemo.updateFileProgress(id, '100%');
        },
        onUploadError: function(id, message){
          $.danidemo.updateFileStatus(id, 'error', message);
          // $.danidemo.addLog('#demo-debug', 'error', 'Не удалось загрузить файл №' + id + ': ' + message);
          $.danidemo.addLog('#demo-files', 'error', 'Не удалось загрузить файл №' + id + ': ' + message);
        },
        onFileTypeError: function(file){
          // $.danidemo.addLog('#demo-debug', 'error', 'Файл \'' + file.name + '\' не может быть загружен: только изображения');
          $.danidemo.addLog('#demo-files', 'error', 'Файл \'' + file.name + '\' не может быть загружен: только изображения jpg, gif, png, tif');
        },
        onFileSizeError: function(file){
          // $.danidemo.addLog/('#demo-debug', 'error', 'Файл \'' + file.name + '\' не может быть добавлен: превышен лимит файла');
          $.danidemo.addLog('#demo-files', 'error', 'Файл \'' + file.name + '\' не может быть загружен: превышен размер файла, максимальный размер 10Мб');
        },
        // onFallbackMode: function(message){
        //   $.danidemo.addLog('#demo-files', 'error', 'Браузер не поддерживается (do something else here!): ' + message);
        // }
      });
      
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