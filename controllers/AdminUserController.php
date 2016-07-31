<?php

/**
 * Description of AdminUserController
 *
 * @author Dima
 */
class AdminUserController extends AdminBase{
    
    public function actionIndex($page = 1) 
    {
        // Проверяем авторизирован ли пользователь и получаем его данные. Если нет, он будет переадресован
        $userId = self::checkAdmin();
        
        $users = User::getAllUser($count = Gallery::SHOW_BY_DEFAULT, $page);
        
        $total = User::getTotalUsers();
        
        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');
        
         $this->render('admin/admin_user/index', ['title' => 'Управление пользователями',
                                                        'users' => $users,
                                                        'pagination' => $pagination,
                                                        'user' => $userId['username']]);
         return true;
    }
    public function actionUpdate($id)
    {
        // Проверяем авторизирован ли пользователь и получаем его данные. Если нет, он будет переадресован
        $user = self::checkAdmin();
        
        $userById = User::getUserById($id);
        
        $submit = filter_input(INPUT_POST, 'submit', FILTER_VALIDATE_BOOLEAN);
        if (isset($submit)) {
            // Если форма отправлена $_POST['submit'])
            // Получаем данные из формы и фильтруем
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $isactive = filter_input(INPUT_POST, 'isactive', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            try {
                User::UserUpdateById($id, $username, $role, $isactive);
                header("Location: /admin/user");
            }catch (Exception $ex) {
                echo 'Выброшено исключение: ',  $ex->getMessage(), "\n";
            }
            
            
        }
        $this->render('admin/admin_user/update', ['title' => 'Редактирование пользователя',
                                                  'userById' => $userById,
                                                  'user' => $user['username']]);
        return true;
    }
    
}
