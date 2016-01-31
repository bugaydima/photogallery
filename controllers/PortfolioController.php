<?php
class PortfolioController
{
    /**
     * Action для страницы портфолио
     */
    public function actionIndex()
    {
        // Список категорий для меню 
        $categories = Category::getCategoryList();
        // Список категорий для меню категорий фотогалереи
        $categoriesPhoto = Category::getCategoryGallery();
        
        $allPhotos = Gallery::getAllPhotos(26);
        // Подключаем вид
        require_once(ROOT . '/views/photo/index.php');
        return true;
    }
}
