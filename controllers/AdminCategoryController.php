<?php

class AdminCategoryController extends AdminBase {

    public function actionIndex($page = 1)
    {
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        $category = Category::getAdminCategoryGallery();
        
        // Общее количетсво категорий (необходимо для постраничной навигации)
//        $total = Category::getTotalCategory();
        // Создаем объект Pagination - постраничная навигация
//        $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');
        $title = "Управления альбомами";
        require_once(ROOT . '/views/admin_category/adminCategory.php');
        return true;
    }
    public function actionAddCategory()
    {
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!User::checkName($name)){
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($name, $sortOrder, $status);
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }
        $title = "Добавления альбома";
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
    }
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Category::deleteCategoryById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }
        if (isset($_POST['back'])) {
            header("Location: /admin/category");
        }
        $title = "Удалить альбом";
        // Подключаем вид
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
}
