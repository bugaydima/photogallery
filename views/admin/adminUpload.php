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
                    <?php foreach ($albums as $cat): ?>
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
                    <div class="col-md-12">
                        <div id="drag-and-drop-zone" class="uploader">
                            <div>Drag &amp; Drop перетащите изображения сюда</div>
                            <div class="or">-или-</div>
                            <div class="browser">
                                <label>
                                    <span>Нажмите чтоб выбрать...</span>
                                    <input type="file" name="files[]"  accept="image/*" multiple="multiple" title='Нажмите чтобы выбрать изображение'>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Загрузки</h3>
                                </div>
                                <div class="panel-body demo-panel-files" id='demo-files'>
                                    <span class="demo-note">Вы еще не выбрали / перетащили файлы...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ROOT . '/views/layouts/admin_footer.php'; ?>
