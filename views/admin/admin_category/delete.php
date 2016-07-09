<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Управление галереей
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="/admin/gategory">Альбомы</a></li>
            <li class="active"><a href="/admin/category/delete">Удаление</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box box-solid box-danger">
                    
                        <div class="box-header">
                            <h4>Удалить альбом #<?php echo $id; ?></h4>
                        </div>
                        <div class="box-body">
                        <p>Вы действительно хотите удалить этот альбом?</p>
                        <form method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="Удалить" />
                            <input type="submit" class="btn btn-primary" name="back" value="Назад" />
                        </form>
                        </div>
                        </div>
                    <!-- /.box-header -->
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div> 
        <!-- /.row -->
    </section>
</div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>

