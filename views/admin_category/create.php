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
                    <div class="box-header">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Добавить новый альбом</h3>
                            </div>
                            <form role="form">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Название</label>
                                    <input type="text" class="form-control" placeholder="Название ...">
                                </div>
                                <div class="form-group">
                                    <label>Порядковый номер</label>
                                    <input type="text" class="form-control" placeholder="Номер ...">
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                    <select class="form-control">
                                        <option>Отображаеться</option>
                                        <option>Скрытый</option>
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa  fa-save"></i>&nbsp;&nbsp;Сохранить</button>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>    
    </section>
</div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>  

