<?php
return array(
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'admin' => 'admin/index',
    // Галерея:
    'portfolio' => 'portfolio/index', //actionIndex в PortfolioController
    'category' => 'photo/index', //actionCategory в CatalogController
    'category/([0-9]+)' => 'photo/category/$1', //actionCategory в CatalogController
    // Главная страница
    'index.php' => 'site/index',
    '' => 'site/index' //actionIndex в SiteController
    
    
          
);
