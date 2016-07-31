<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Управление пользователями
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><a href="/admin/gallery">Пользователи</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-bordered">
                <tr>
                  <th style="width: 10px"><input type="checkbox" id="check_all" class="checkbox"></th>
                  <th style="width: 10px" >ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Isactive</th>
                  <th style="width: 20px">Edit</th>
                  <th style="width: 20px">Delete</th>
                </tr>
              <?php foreach ($users as $user):?>
                <tr>
                    <td><input type="checkbox" name="check_name[]" value="<?= $user['id'];?>" 
                                    class="checkbox"></td>
                    <td><?php echo $user['id'];?></td>
                  <td><?php echo $user['username'];?></td>
                  <td><?php echo $user['email'];?></td>
                  <td><?php echo $user['role'];?></td>
                  <td><?php echo User::getStatusText($user['isactive']); ?></td>
                  <td><a href="/admin/user/update/<?php echo $user['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="/admin/user/delete/<?php echo $user['id']; ?>" title="Удалить"><i class="fa fa-trash-o"></i></a></td>
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