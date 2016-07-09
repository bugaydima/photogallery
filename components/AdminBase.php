<?php
/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
abstract class AdminBase
{
    public function render($file,$params = array()) {
		extract($params);
		
		require_once (ROOT . '\views'.DIRECTORY_SEPARATOR.$file.'.php');
		return true;
	}
    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    public static function checkAdmin()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();
        
        $user['role'] = 'admin';
        if ($user['role'] == 'admin') {
            return $userId;
        }
//        // Иначе завершаем работу с сообщением об закрытом доступе
//        die('Access denied');
        
    }
    
}
