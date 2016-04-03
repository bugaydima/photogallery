<?php include ROOT . '/views/layouts/admin_header.php'; ?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Загрузка изображений
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> Главная</a></li>
            <li class="active"><a href="/admin/upload">Загрузка</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <h4><label for="sel1"><span class="label label-info">Категория</span></label></h4>

                <select class="form-control" id = "my_select" name="select">
                    <?php foreach ($category as $cat): ?>
                        <option  value="<?= $cat['id']; ?>"><?= $cat['name']; ?></option>

                    <?php endforeach; ?>
                </select>

                <div id="info"></div>
            </div>
            <p></p>
        </div>
        <div class="row" >
            <div class="col-xs-12">
                <div class="box-body">
                    <div class="col-md-12 col-sm-6 col-xs-4">
                        <div class="upload" id="upload"></div>
                        <div id="res"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>
