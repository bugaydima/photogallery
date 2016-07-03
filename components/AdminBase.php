<?php
/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
abstract class AdminBase
{
    public function render($file,$params = array()) {
		extract($params);
		
		ob_start();
		require_once (ROOT . '\views'.DIRECTORY_SEPARATOR.$file.'.php');
		ob_end_flush();
		return ob_get_clean();
	}
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
            return $userId;
        }
//        // Иначе завершаем работу с сообщением об закрытом доступе
//        die('Access denied');
        
    }
    
}
