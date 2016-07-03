<?php

class UserController {
    
    /**
     * Регистрация пользователя 
     * @param string $username <p>Имя пользователя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @param string $confirm_password <p>Повторить пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function actionRegister(){
        
        // Переменные для формы
        $email = false;
        $password = false;
        $confirm_password = false;
        $username = false;
        $registration = false;
        // Обработка формы
        if (isset($_POST['submit'])){
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $username = $_POST['user_name'];
            
            $dbh = Db::getConnection();

            $config = new PHPAuth\Config($dbh);
            $auth = new PHPAuth\Auth($dbh, $config, $language = "ru_RU");
            
            $registration = $auth->register($email, $password, $confirm_password, $username, $params = Array(), $captcha = NULL, $sendmail = TRUE);
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
        $registration = false;
        $remember = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (isset($_POST['remember'])){
                $remember = $_POST['remember'];
            }
            $dbh = Db::getConnection();

            $config = new PHPAuth\Config($dbh);
            $auth = new PHPAuth\Auth($dbh, $config, $language = "ru_RU");
            
            $registration = $auth->login($email, $password, $remember);
            
            if ($registration['error'] == false) {
                setcookie($config->cookie_name, $registration['hash'], $registration['expire'], $config->cookie_path, $config->cookie_domain, $config->cookie_secure, $config->cookie_http);
             }
             header("Location: /admin");
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
        $dbh = Db::getConnection();

        $config = new PHPAuth\Config($dbh);
        $auth = new PHPAuth\Auth($dbh, $config);

        if (!$auth->isLogged()) {
            header("Location: /user/login");
        }
        $userHash = $auth->getSessionHash();
        $auth->logout($userHash);
        
        // Перенаправляем пользователя на главную страницу
        header("Location: /user/login");
    }
}
