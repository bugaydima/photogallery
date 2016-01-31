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
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
}
