<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb ">
                    <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="/admin/category">Альбомы</a></li>
                    <li class="active"><a href="/admin/category/add">Добавления альбома</a></li>
                </ol>

                <div class="box">
                  <?php if (isset($errors) && is_array($errors)): ?>
                    <div class="box box-solid box-danger">
                        <div class="box-header">Заполните все поля!</div>
                            <div class="box-body">
                                <ul style="list-style-type: none; content: "&nbsp"; ">
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            </div>
                    </div>
                <?php endif; ?>
                    <div class="box-header">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Добавить новый альбом</h3>
                            </div>
                            <form role="form" action="" method="post" id="ajax_form">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Название</label>
                                    <input type="text" class="form-control clr" placeholder="Название ..." name="name">
                                </div>
                                <div class="form-group">
                                    <label>Порядковый номер</label>
                                    <input type="text" class="form-control clr" placeholder="Номер ..." name="sort_order">
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Отображаеться</option>
                                        <option value="0">Скрытый</option>
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <button id="form_ajax" type="submit" class="btn btn-primary" name="submit"><i class="fa  fa-save"></i>&nbsp;&nbsp;Сохранить</button>
                                </div>
                                </div>
                                <div class="col-md-6">
                            </form>
        <div class="box box-success box-solid" id="result_form" style="display: none">
            <div class="box-header">
                <h3 class="box-title" id="result"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="box box-warning box-solid" id="result_form2" style="display: none">
            <div class="box-header">
                <h3 class="box-title" id="result_error"></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
        </div>
                    </div> 
                </div>
            </div>
        </div>    
    </section>
</div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>  

