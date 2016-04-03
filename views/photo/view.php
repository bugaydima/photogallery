<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="tab-content">
    <div class="tab">
        <h1>Портфолио</h1>
        <div id="portfolio">
            <!-- Begin Portfolio Navigation -->
            <ul class="gallerynav">
                <?php foreach ($categoriesPhoto as $category): ?>
                    <!--class="selected-1"-->
                    <li class=""><a href="<?php echo $category['id']; ?>">
                            <?php echo $category['name']; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul><!-- End Portfolio Navigation -->
            <!-- Begin Portfolio Elements -->

            <ul id="gallery" class="grid">
                <!-- Begin Image 1 -->
                <?php foreach ($allPhotos as $photo):?>
                <li data-id="id-1" class="photography">
                    <a href="/template/gallery/large/<?php echo $photo['name'];?>" rel="prettyPhoto[gallery]">
                        <img src="/template/gallery/small/<?php echo $photo['name'];?>" alt="Lorem fdskfertw" />
                    </a>
                </li>
                <?php endforeach;?>
                <!-- End Image 1 -->
            </ul>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<?php include ROOT . '/views/layouts/footer.php'; ?>
