<?php
//namespace UserController;
//
//use PHPAuth;
/**
 * Description of UserController
 *
 * @author Dima
 */

class UserController {
    
    /**
     * Регистрация пользователя 
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @param string $confirm_password <p>Повторить пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function actionRegister(){
        
        // Переменные для формы
//        $name = false;
        $email = false;
        $password = false;
        $confirm_password = false;
        $registration = false;
        // Обработка формы
        if (isset($_POST['submit'])){
            // Если форма отправлена 
            // Получаем данные из формы
//            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            
            $dbh = new PDO("mysql:host=localhost;dbname=gallery", "root", "");

            $config = new PHPAuth\Config($dbh);
            $auth = new PHPAuth\Auth($dbh, $config, $language = "ru_RU");
            
            $registration = $auth->register($email, $password, $confirm_password, $params = Array(), $captcha = NULL, $sendmail = TRUE);
            
            // Флаг ошибок
//            $errors = false;
//            // Валидация полей
//            if (!User::checkName($name)){
//                $errors[] = 'Имя не должно быть короче 2-х символов';
//            }
//            if (!User::checkEmail($email)){
//                $errors[] = 'Неправильный email';
//            }
//            if (!User::checkPassword($password)){
//                $errors[] = 'Пароль не должен быть короче 6-ти символов';
//            }
//            if (User::checkEmailExists($email)) {
//                $errors[] = 'Такой email уже используется';
//            }
//            
//            if ($errors == false) {
//                // Если ошибок нет
//                // Регистрируем пользователя
//                $result = User::register($name, $email, $password);
//            }
        }
        require_once (ROOT . '/views/user/register.php');
        return true;
    }
    /**
     * Action для страницы "Вход на сайт"
     */
    public function actionLogin()
    {
        // Переменные для формы
        $email = false;
        $password = false;
        
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /admin");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/user/login.php');
        return true;
    }
    /**
     * Удаляем данные о пользователе из сессии
     */
    public function actionLogout()
    {
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /user/login");
    }
}
