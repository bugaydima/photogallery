<?php

class AdminCategoryController extends AdminBase {

    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        $category = Category::getAllCategoryGallery();
        
        // Общее количетсво категорий (необходимо для постраничной навигации)
        $total = Category::getTotalCategory();
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');
        $title = "Управления альбомами";
        require_once(ROOT . '/views/admin_category/adminCategory.php');
        return true;
    }
    public static function actionAddCategory()
    {
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        $title = "Добавления альбома";
        $test = 'lorem insum';
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }
}
