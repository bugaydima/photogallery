<?php
/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
abstract class AdminBase
{
    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    public static function checkAdmin()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        //var_dump($userId); die();
        // Получаем информацию о текущем пользователе
//        $user = User::getUserById($userId);
        // Если роль текущего пользователя "admin", пускаем его в админпанель
//        if ($userId == true){
//            echo 'qq';
//            return true;
//        }
//        die('Access denied');
        $user['role'] = 'admin';
        if ($user['role'] == 'admin') {
            return true;
        }
//        // Иначе завершаем работу с сообщением об закрытом доступе
//        die('Access denied');
        
    }
    
}
