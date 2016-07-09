<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <section class="content">
        
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb ">
                    <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="/admin/category">Альбомы</a></li>
                    <li class="active"><a href="/admin/category/add">Редактирование альбома</a></li>
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
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Редактировать альбом - "<?= $category['name'];?>"</h3>
                            </div>
                            <form role="form" action="#" method="post">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Название</label>
                                    <input type="text" class="form-control" value="<?= $category['name'];?>" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Порядковый номер</label>
                                    <input type="text" class="form-control" value="<?= $category['sort_order'];?>" name="sort_order">
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                    <select class="form-control" name="status">
                                        <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображаеться</option>
                                        <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрытый</option>
                                    </select>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" name="submit"><i class="fa  fa-save"></i>&nbsp;&nbsp;Сохранить</button>
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

