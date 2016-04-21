<?php

class AdminUploadController extends AdminBase{

    public function actionIndex(){

        self::checkAdmin();
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);
        $albums = Category::getCategoryGallery();
        $category = Category::getAdminCategory();

         if($_SERVER['REQUEST_METHOD'] == 'POST'){
             if (isset($_POST['data'])) {
                 $_SESSION['x'] = $_POST['data'];
                 echo $_POST['data'];
             }
            if(!empty($_FILES['newfile'])){
                if(move_uploaded_file($_FILES['newfile']['tmp_name'], 'template/gallery/large/' . $_FILES['newfile']['name'])){

                    $img = new resizeImg('template/gallery/large/' . $_FILES['newfile']['name']);
                    $img->resize(150, 150, 'auto');
                    $img->save($_FILES['newfile']['name']);
                    Gallery::saveImgToDB($_FILES['newfile']['name'], $_SESSION['x']);
                }else{
                    echo 'ERROR';
                }
            }
        }
        require_once(ROOT . '/views/admin/adminUpload.php');
        return true;
    }
}

