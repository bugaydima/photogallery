$(document).ready(function(){
    $("select[name='select']").bind('change', function(){
      
        $.ajax({
            url: "/admin/upload",
            type: "POST",
            data: ({data: $("#my_select").val()}),
            dataType: "html",
            beforeSend: funcBefore,
            success: funcSuccess
        });
    });
});
function funcBefore() {
    $('#info').text('Ожидание данных...');
}
function funcSuccess(data) {
    $('#info').text("Заввершено");
}
