<?php include ROOT . '/views/layouts/admin_header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

      <h1>
        Обзор
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="/admin/"><i class="fa fa-dashboard"></i>Главная</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-photo"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Всего фотографий</span>
                        <span class="info-box-number"><?php echo $total;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-photo"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Всего альбомов</span>
                        <span class="info-box-number"><?php echo $totalAlbum;?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



<?php include ROOT . '/views/layouts/admin_footer.php'; ?>

