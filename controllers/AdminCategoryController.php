<?php

class AdminCategoryController extends AdminBase {

    public function actionIndex($page = 1)
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();
        
        $category = Category::getAdminCategoryGallery();

        // Общее количетсво категорий (необходимо для постраничной навигации)
        //$total = Category::getTotalCategory();
        // Создаем объект Pagination - постраничная навигация
        //$pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');

        $this->render('admin/admin_category/category', ['title' => 'Управления альбомами',
                                                            'category' => $category,
                                                            'user'  => $userId['username']]);
        return true;
    }
    public function actionAddCategory()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();

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
        $this->render('admin/admin_category/create', ['title' => 'Добавления альбома',
                                                      'user'  => $userId['username']]);
        return true;
    }
    public function actionAddAjaxCategory()
    {
            // Если форма отправлена
            // Получаем данные из формы
            if ((!empty($_POST))&&(isset($_SERVER['HTTP_X_REQUESTED_WITH']))&&
                    ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
                $name = $_POST['name'];
                $sortOrder = $_POST['sort_order'];
                $status = $_POST['status'];
             // Флаг ошибок в форме
                $errors = false;
             // При необходимости можно валидировать значения нужным образом
            if (!User::checkName($name)){
                $errors[] = 'Название альбома не должно быть короче 2-х символов';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($name, $sortOrder, $status);
               }
            }
            $result = [
                "response" => "Альбом успешно добавлен!!!",
                "error" => $errors
                ];
            echo json_encode($result);
        return true;
    }
    public function actionDelete($id)
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();
        
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
        // Подключаем вид
        $this->render('admin/admin_category/delete', ['title' => 'Удалить альбом',
                                                      'id'    => $id,  
                                                      'user'  => $userId['username']]);
        return true;
    }
     public function actionUpdate($id)
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();
        
        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }
        // Подключаем вид
        $this->render('admin/admin_category/update', ['title' => 'Редактировать альбом',
                                                      'category' => $category,
                                                      'user'  => $userId['username']]);
        return true;
    }

}
