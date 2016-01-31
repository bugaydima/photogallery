<?php

class PhotoController {

    public function actionIndex(){

    }

   
    public function actionCategory($categoryId) {
  
        $categories = Category::getCategoryList();
        $categoriesPhoto = Category::getCategoryGallery();
        $allPhotos = Gallery::getPhotoListByCategoryId($categoryId);
        // Подключаем вид
        require_once(ROOT . '/views/photo/view.php');
        return true;
    }
   
}