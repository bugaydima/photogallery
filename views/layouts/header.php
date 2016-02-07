<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Портфолио</title>
        
        <link rel="shortcut icon" href="/template/favicon.ico">
        <link rel="stylesheet" type="text/css" href="/template/css/style.css" media="all" />
        <link rel="stylesheet" media="all" href="/template/css/prettyPhoto.css" type="text/css" />
        <link rel="stylesheet" media="all" href="/template/css/tipTip.css" type="text/css" />
        <link rel="stylesheet" href="/template/css/nivo-slider.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/template/css/nivostyle.css" type="text/css" media="screen" />
        <script type="text/javascript" src="/template/js/jquery-1.5.min.js"></script>
        <script type="text/javascript" src="/template/js/quicksand.js"></script>
        <script type="text/javascript" src="/template/js/scripts.js"></script>
        <script type="text/javascript" src="/template/js/jquery.prettyPhoto.js"></script>
        <script type="text/javascript" src="http://twitterjs.googlecode.com/svn/trunk/src/twitter.min.js"></script>
        <script src="/template/js/jquery.form.js" type="text/javascript" charset="utf-8"></script>
    
    <body>
        <a name="top" id="top"></a>
        <!-- Top Strip -->
        <div id="strip"></div>

        <div id="container">
            <!-- Begin Header -->
            <div id="header">
                <img src="/template/images/logo.png" width="248" height="134" alt="" class="logo" /> <!-- Begin Social Links -->

                <ul class="social">
                    <li><a href="/admin"><img src="/template/images/social/rss.png" width="16" height="16" alt="" title="This is a Tool Tip"
                                         class="link" /></a></li>
                    <li><a href="#"><img src="/template/images/social/twitter.png" width="16" height="16" alt="" title=
                                         "This is a Tool Tip" class="link" /></a></li>
                    <li><a href="#"><img src="/template/images/social/dribbble.png" width="16" height="16" alt="" title=
                                         "This is a Tool Tip" class="link" /></a></li>
                    <li><a href="#"><img src="/template/images/social/deviantart.png" width="16" height="16" alt="" title=
                                         "This is a Tool Tip" class="link" /></a></li>
                    <li><a href="#"><img src="/template/images/social/behance.png" width="16" height="16" alt="" title=
                                         "This is a Tool Tip" class="link" /></a></li>
                    <li><a href="#"><img src="/template/images/social/facebook.png" width="16" height="16" alt="" title=
                                         "This is a Tool Tip" class="link" /></a></li>
                </ul><!-- End Social Links -->
            </div><!-- End Header -->
<div id="wrapper">
                <!-- Left Menu Links -->
<div id="smoothmenu1">
    <ul id="tab-menu" class="ddsmoothmenu">
        <?php foreach ($categories as $category): ?>
            <li>
                <a href="/<?php echo $category['url']; ?>"><?php echo $category['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
 
    
    
    
    
    
    <?php // if (isset($category['children'])): ?>
<!--        <ul>
            <?php // echo '<pre>' . print_r($category['children'], true) . '</pre>';?>
            <?php // foreach ($category['children'] as $category_cld): ?>
                <li><a href="<?php //c echo $category_cld['url']; ?>"><?php // echo $category_cld['name']; ?></a></li>
            <?php // endforeach; ?>
        </ul>-->
    <?php // endif; ?>