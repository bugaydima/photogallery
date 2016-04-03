<?php
/**
 * Description of AdminController
 *
 * @author Dima
 */
class AdminController extends AdminBase {
  
    public function actionIndex(){
        
        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        
        $total = Gallery::getTotalPhoto(); 
        
        $totalAlbum = Gallery::getTotalAlbumsPhoto();
        
       
        require_once(ROOT . '/views/admin/AdminIndex.php');
        return true;
    }
}
