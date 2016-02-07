<?php
/**
 * Description of AdminController
 *
 * @author Dima
 */
class AdminController extends AdminBase {
  
    public function actionIndex(){
        
        $x = self::checkAdmin();
        var_dump(parent::checkAdmin());
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        
        $total = Gallery::getTotalPhoto();
        require_once(ROOT . '/views/admin/AdminIndex.php');
        return true;
    }
}
