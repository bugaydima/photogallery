<?php
/**
 * Контроллер CartController
 */
class SiteController
{
    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
//        $categories = Category::getCategoryList();
        $categories2 = Category::getCategoryList2();
        $categories3 = Category::mapTree($categories2);
        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
   
}
