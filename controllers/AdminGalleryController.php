<?php
/**
 * Description of AdminController
 *
 * @author Dima
 */
class AdminGalleryController extends AdminBase {

    public function actionIndex($page = 1)
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();

        $allPhotos = Gallery::getAllPhotosByAdmin($count = Gallery::SHOW_BY_DEFAULT, $page);
        // Общее количетсво фотографий (необходимо для постраничной навигации)
        $total = Gallery::getTotalPhoto();

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');
        
        return $this->render('admin\admin_gallery\index', ['title' => 'Галерея',
                                                           'allPhotos' => $allPhotos,
                                                           'pagination' => $pagination,
                                                           'user' => $userId['username']]);
    }
    public function actionDelete($id)
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Gallery::deletePhotoById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/gallery");
        }
        if (isset($_POST['back'])) {
            header("Location: /admin/gallery");
        }
        // Подключаем вид
        return $this->render('admin\admin_gallery\delete', ['title' => 'Галерея',
                                                            'id' => $id,    
                                                            'user' => $userId['username']]);
    }
    public function actionUpdate($id)
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = self::checkAdmin();

        $category = Category::getCategoryGallery();
        $photo = Gallery::getPhotoById($id);
        
        $submit = filter_input(INPUT_POST, 'submit', FILTER_VALIDATE_BOOLEAN);
        if (isset($submit)) {
            // Если форма отправлена $_POST['submit'])
            // Получаем данные из формы и фильтруем
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            // Сохраняем изменения
            Gallery::updatePhotoById($id, $name, $category, $status, $photo['name']);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/gallery");
        }
        // Подключаем вид
        return $this->render('admin\admin_gallery\update', ['title' => 'Редактирование фото',
                                                            'id' => $id,    
                                                            'photo' => $photo,    
                                                            'category' => $category,    
                                                            'user' => $userId['username']]);
    }
}
