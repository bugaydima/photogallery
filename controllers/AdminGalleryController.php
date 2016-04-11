<?php
/**
 * Description of AdminController
 *
 * @author Dima
 */
class AdminGalleryController extends AdminBase {
  
    public function actionIndex($page = 1){
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        
        $allPhotos = Gallery::getAllPhotosByAdmin($count = Gallery::SHOW_BY_DEFAULT, $page);
        // Общее количетсво фотографий (необходимо для постраничной навигации)
        $total = Gallery::getTotalPhoto();
       
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');
        $title = "Галерея";
        require_once(ROOT . '/views/admin/admin_gallery/gallery.php');
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
            Gallery::deletePhotoById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/gallery");
        }
        if (isset($_POST['back'])) {
            header("Location: /admin/gallery");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_gallery/delete.php');
        return true;
    }
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        
        $category = Category::getCategoryGallery();
        $photo = Gallery::getPhotoById($id);
        
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $category = $_POST['category'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Gallery::updatePhotoById($id, $name, $category, $status);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/gallery");
        }
        $title = 'Редактирование фото';
        // Подключаем вид
        require_once(ROOT . '/views/admin/admin_gallery/update.php');
        return true;
    }
}
