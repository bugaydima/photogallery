<?php

class AdminController extends AdminBase {

    public function actionIndex(){
        // Проверяем авторизирован ли пользователь и получаем его данные. Если нет, он будет переадресован
        $userId = self::checkAdmin();

        $total = Gallery::getTotalPhoto();

        $totalAlbum = Gallery::getTotalAlbumsPhoto();

        $category = Category::getAdminCategory();
        
        return $this->render('admin\adminIndex', ['title' => 'Главная',
                                                  'total' => $total,
                                                  'totalAlbum' => $totalAlbum,
                                                  'category' => $category,
                                                  'user' => $userId['username']]);
    }
}
