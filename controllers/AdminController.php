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
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_FILES['newfile'])){
                if(move_uploaded_file($_FILES['newfile']['tmp_name'], 'template/uploads/' . $_FILES['newfile']['name'])){
                    echo 'OK';
                }else{
                    echo 'ERROR';
                }
            }
        }
        require_once(ROOT . '/views/admin/AdminIndex.php');
        return true;
    }
}
