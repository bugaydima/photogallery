<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Управления альбомами
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active"><a href="/admin/category">Альбомы</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a class="btn btn-primary" href="/admin/category/add"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Добавить альбом</a>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th style="width: 10px"></th>
                                <th style="width: 10px" >ID</th>
                                <th>Name</th>
                                <th>sort_order</th>
                                <th>Status</th>
                                <th style="width: 20px">Edit</th>
                                <th style="width: 20px">Delete</th>
                            </tr>
                            <?php foreach ($category as $cat): ?>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td><?php echo $cat['id']; ?></td>
                                    <td><?php echo $cat['name']; ?></td>
                                    <td><?php echo $cat['sort_order']; ?></td>
                                    <td><?php echo $cat['status']; ?></td>
                                    <td><a href="/admin/gallery/update/<?php echo $cat['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td><a href="/admin/gallery/delete/<?php echo $cat['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                                </tr>
                            <?php endforeach; ?>

                        </table>
                        <div class="box-footer clearfix">
                            <?php echo $pagination->get(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>  
