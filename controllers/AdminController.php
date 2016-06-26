<?php
/**
 * Description of AdminController
 *
 * @author Dima
 */
//include("vendor/phpauth/phpauth/Config.php");
//include("vendor/phpauth/phpauth/Auth.php");
class AdminController extends AdminBase {

    public function actionIndex(){

        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);

        $total = Gallery::getTotalPhoto();

        $totalAlbum = Gallery::getTotalAlbumsPhoto();

        $category = Category::getAdminCategory();
        $title = "Главная";
        
//        $dbh = new PDO("mysql:host=localhost;dbname=gallery", "root", "");
//
//        $config = new PHPAuth\Config($dbh);
//        $auth = new PHPAuth\Auth($dbh, $config);
//
//        if (!$auth->isLogged()) {
//            header('HTTP/1.0 403 Forbidden');
//            echo "Forbidden";
//
//            exit();
//        }

        require_once(ROOT . '/views/admin/AdminIndex.php');
        return true;
    }
}
