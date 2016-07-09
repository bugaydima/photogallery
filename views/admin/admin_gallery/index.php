<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Управление галереей
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><a href="/admin/gallery">Галерея</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a class="btn btn-primary" href="/admin/upload"><i class="fa  fa-download"></i>&nbsp;&nbsp;Загрузить</a>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <tr>
                  <th style="width: 10px"><input type="checkbox" id="check_all" class="checkbox"></th>
                  <th style="width: 10px" >ID</th>
                  <th style="width: 100px">Name</th>
                  <th>Preview</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th style="width: 20px">Edit</th>
                  <th style="width: 20px">Delete</th>
                </tr>
                <?php foreach ($allPhotos as $photo):?>
                <tr>
                    <td><input type="checkbox" name="check_name[]" value="<?= $photo['id'];?>" 
                                    class="checkbox"></td>
                    <td><?php echo $photo['id'];?></td>
                  <td><?php echo $photo['name'];?></td>
                  <td><img src="/template/gallery/small/<?php echo $photo['name'];?>"  width="75" height="50" /></td>
                  <td><?php echo $photo['category_id'];?></td>
                  <td><?php echo Category::getStatusText($photo['status']); ?></td>
                  <td><a href="/admin/gallery/update/<?php echo $photo['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="/admin/gallery/delete/<?php echo $photo['id']; ?>" title="Удалить"><i class="fa fa-trash-o"></i></a></td>
                </tr>
                <?php endforeach;?>
                <div id="results"><!-- content will be loaded here --></div>
              </table>
                <div class="box-footer clearfix">
                     <?php echo $pagination->get(); ?>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div> 
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>