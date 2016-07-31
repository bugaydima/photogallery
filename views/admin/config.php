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
                <div class="box-header">
                    <div class="box-tools"></div>
                <button type="submit" class="btn btn-primary"><i class="fa  fa-save"></i>&nbsp;&nbsp;Сохранить</button>
                </div>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-hover">
                <tr>
                    <th>Setting</th>
                  <th>Value</th>
                </tr>
              <?php foreach ($config as $conf):?>
                <tr>
                    
                    <td style="width: 200px"><?php echo $conf['setting'];?></td>
                    <td style="width: 400px"><input type="text" class="form-control" value=" <?php echo $conf['value'];?>"></td>
<!--                  <td><a href="/admin/user/update/" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                  <td><a href="/admin/user/delete/" title="Удалить"><i class="fa fa-trash-o"></i></a></td>-->
                </tr>
                <?php endforeach;?>
                <div id="results"><!-- content will be loaded here --></div>
              </table>
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