<?php
class PhotoController
{
    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories2 = Category::getCategoryList2();
        $categories3 = Category::mapTree($categories2);
        $categoriesPhoto = Category::getMenuGallery();
        
        $allPhotos = Gallery::getAllPhotos(26);
        // Подключаем вид
        require_once(ROOT . '/views/photo/index.php');
        return true;
    }
   
}
