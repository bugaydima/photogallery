<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Управление галереей
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li><a href="/admin/gallery">Галерея</a></li>
            <li class="active"><a href="/admin/gallery/delete">Удаление</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <h4>Удалить товар #<?php echo $id; ?></h4>
                        <p>Вы действительно хотите удалить этот товар?</p>
                        <form method="post">
                            <input type="submit" class="btn btn-danger" name="submit" value="Удалить" />
                        </form>
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

