<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>

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

<!--    <script type="text/javascript">
        $(document).ready(function () {
            $('#submitform').ajaxForm({
                target: '#error',
                success: function () {
                    $('#error').fadeIn('slow');
                }
            });
        });
    </script>-->
</head>
<body>
    <a name="top" id="top"></a>

    <!-- Top Strip -->

    <div id="strip"></div>

    <div id="container">
        <!-- Begin Header -->

        <div id="header">
            <img src="/app/webroot/img/logo.png" width="248" height="134" alt="" class="logo" /> <!-- Begin Social Links -->

            <ul class="social">
                <li><a href="#"><img src="/app/webroot/img/social/rss.png" width="16" height="16" alt="" title="This is a Tool Tip"
                                     class="link" /></a></li>

                <li><a href="#"><img src="/app/webroot/img/social/twitter.png" width="16" height="16" alt="" title=
                                     "This is a Tool Tip" class="link" /></a></li>

                <li><a href="#"><img src="/app/webroot/img/social/dribbble.png" width="16" height="16" alt="" title=
                                     "This is a Tool Tip" class="link" /></a></li>

                <li><a href="#"><img src="/app/webroot/img/social/deviantart.png" width="16" height="16" alt="" title=
                                     "This is a Tool Tip" class="link" /></a></li>

                <li><a href="#"><img src="/app/webroot/img/social/behance.png" width="16" height="16" alt="" title=
                                     "This is a Tool Tip" class="link" /></a></li>

                <li><a href="#"><img src="/app/webroot/img/social/facebook.png" width="16" height="16" alt="" title=
                                     "This is a Tool Tip" class="link" /></a></li>
            </ul><!-- End Social Links -->
        </div><!-- End Header -->

        <div id="wrapper">
            <!-- Left Menu Links -->

            <div id="smoothmenu1">
                <ul id="tab-menu" class="ddsmoothmenu">
                        <?php foreach ($categories as $category): ?>
                        <li><a href="/<?php echo $category['url'];?>"><?php echo $category['name'];?></a>
<!--                            <?php // if(isset($category['children'])):?>
                            <ul>
                                    <?php // foreach ($category['children'] as $cat): ?>
                                            <li>
                                                <a href="#"><?php // echo $cat['name']; ?></a>
                                            </li>
                                    <?php // endforeach;?>
                                            </ul>   
                                <?php // endif;?>
                                         -->
                            </li>
                        <?php endforeach;?>
                    </ul>
                <!-- Introduction Page Starts -->
                <div class="tab-content">
<div class="tab">
            <h1>Page With Images</h1>

            <p><img src="/img/picture.jpg" class="right" width="211" height="120" alt="" />Lorem ipsum dolor sit
            amet, consectetur adipiscing elit. Nam elementum consequat sem, nec tincidunt enim feugiat sed. Vestibulum
            ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed egestas mattis tortor,
            quis auctor orci commodo id. In hac habitasse platea dictumst. Integer sed nisi nibh. Integer neque mi,
            pellentesque ut adipiscing ultrices, egestas vel ligula. Integer interdum ultrices turpis. Ut non est sed
            odio malesuada congue ac id ipsum. Duis mi tellus, porttitor a tristique eu, porttitor a odio. Curabitur
            accumsan cursus sollicitudin. Nullam quis ante ante, sed molestie elit. Morbi egestas est quis metus luctus
            accumsan. Duis interdum lectus eget est hendrerit mollis.</p>

            <p><img src="/img/picture.jpg" class="left" width="211" height="120" alt="" />Aliquam porttitor
            faucibus rhoncus. Aliquam erat volutpat. Vestibulum molestie fringilla mollis. Fusce eu neque arcu. Donec
            blandit imperdiet mollis. Etiam suscipit nisl eget libero aliquet tincidunt. Ut non est sed odio malesuada
            congue ac id ipsum. Duis mi tellus, porttitor a tristique eu, porttitor a odio. Curabitur accumsan cursus
            sollicitudin. Nullam quis ante ante, sed molestie elit. Morbi egestas est quis metus luctus accumsan. Duis
            interdum lectus eget est hendrerit mollis.Ut non est sed odio malesuada congue ac id ipsum. Duis mi tellus,
            porttitor a tristique eu, porttitor a odio. Curabitur accumsan cursus sollicitudin. Nullam quis ante ante,
            sed molestie elit. Morbi egestas est quis metus luctus accumsan. Duis interdum lectus eget est hendrerit
            mollis.</p><!-- Scrolling Quotes -->

            <blockquote>
              <p>Ut eu consectetur nisi. Praesent facilisis diam nec sapien gravida non mattis justo imperdiet.
              Vestibulum nisl urna, euismod sit amet congue at, bibendum non risus.</p><cite>&ndash; Quote Author
              (Quote #1)</cite>
            </blockquote>

            <blockquote>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu eros velit, non blandit ipsum.
              Donec pretium, nibh vitae tristique tempor, enim sem condimentum lacus, vel mattis mauris risus id justo.
              Nullam tincidunt, augue sit amet euismod condimentum, orci elit dignissim odio, a viverra augue enim in
              lectus.</p><cite>&ndash; Quote Author (Quote #2)</cite>
            </blockquote>

            <blockquote>
              <p>Donec rutrum convallis viverra. Suspendisse vehicula, risus sit amet luctus pharetra, quam ante
              condimentum metus, porttitor vulputate magna felis quis dui.</p><cite>&ndash; Quote Author (Quote
              #3)</cite>
            </blockquote>
          </div><!-- Page With Images Ends -->
                    
                    <div id="thumbs">
                        <span></span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="push"></div>
    </div><!-- Begin Footer -->

    <div id="footer-wrapper">
        <div id="footer">
            <div id="footer-content">
                <!-- Begin Copyright -->

                <div id="copyright">
                    <p>&copy; Copyright <script type="text/javascript">
                        //<![CDATA[
                        var d = new Date()
                        document.write(d.getFullYear())
                        //]]>
                        </script> Signature | CV / Resume Portfolio Template</p>
                </div>

                <p id="back-top"><a href="#top" class="tip_top" title="back to top">top &uarr;</a></p><!-- End Copyright -->

            </div>
        </div>
    </div>
</body>
</html>

