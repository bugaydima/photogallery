<?php
return array(
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'admin/gallery/page-([0-9]+)' => 'adminGallery/index/$1',
    'admin/gallery/delete/([0-9]+)' => 'adminGallery/delete/$1',
    'admin/gallery' => 'adminGallery/index',
    'admin' => 'admin/index',
    // Галерея:
    'portfolio' => 'portfolio/index', //actionIndex в PortfolioController
    'category' => 'photo/index', //actionCategory в CatalogController
    'category/([0-9]+)' => 'photo/category/$1', //actionCategory в CatalogController
    // Главная страница
    'index.php' => 'site/index',
    '' => 'site/index' //actionIndex в SiteController
    
    
          
);
