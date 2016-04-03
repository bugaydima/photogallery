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
        
        require_once(ROOT . '/views/admin/adminGallery.php');
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
            header("Location: /admin/adminGallery");
        }
        if (isset($_POST['back'])) {
            header("Location: /admin/adminGallery");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin/adminPhotoDelete.php');
        return true;
    }
}
