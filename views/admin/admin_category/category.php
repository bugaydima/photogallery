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
      <form role="form" action="" method="post" id="ajax_form">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <button type="button" id="myModal2" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-trash-o"></i>&nbsp;&nbsp;&nbsp; Удалить выбраные
                        </button>
                        
                        <div class="col-xs-3">
                        <a class="btn btn-primary" href="/admin/category/add"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp; Добавить альбом</a>
                        </div>
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
                                <th style="width: 10px"><input type="checkbox" id="check_all" class="checkbox"></th>
                                <th style="width: 10px" >ID</th>
                                <th>Название</th>
                                <th>Порядковый номер</th>
                                <th>Статус</th>
                                <th style="width: 20px">Edit</th>
                                <th style="width: 20px">Delete</th>
                            </tr>
                            <?php foreach ($category as $cat): ?>
                                <tr>
                                    <td><input type="checkbox" name="check_name[]" value="<?= $cat['id'];?>" 
                                    class="checkbox"></td>
                                    <td><?php echo $cat['id']; ?></td>
                                    <td><?php echo $cat['name']; ?></td>
                                    <td><?php echo $cat['sort_order']; ?></td>
                                    <td><?php echo Category::getStatusText($cat['status']); ?></td>
                                    <td><a href="/admin/category/update/<?php echo $cat['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                    <td><a href="/admin/category/delete/<?php echo $cat['id']; ?>" title="Удалить"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                            <?php endforeach; ?>

                        </table>
                        <div class="box-footer clearfix">
                            
                        <!-- Modal -->
                        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Удалить альбом</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Вы действительно хотите удалить этот альбом?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
                                        <button id="delete_select" class="btn btn-danger" name="delete2"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;&nbsp; Удалить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php // echo $pagination->get(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </form>
    </section>
</div>
 
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>  
