<?php

class UserController extends AdminBase{
    
    
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
            
            $registration = $auth->register($email, $password, $confirm_password, $username, $role = 'user', $params = Array(), $captcha = NULL, $sendmail = TRUE);
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
            //var_dump($registration);
            if ($registration['error'] == false) {
                setcookie($config->cookie_name, $registration['hash'], $registration['expire'], $config->cookie_path, $config->cookie_domain, $config->cookie_secure, $config->cookie_http);
                header("Location: /admin");
             }
             //header("Location: /admin");
        }
        // Подключаем вид
        return $this->render('user/login', ['registration' => $registration]);
        return true;
    }
    /**
     * Активация email
     * @return boolean <p>Результат выполнения метода</p>
     */
    public function actionActivate() 
    {
        $dbh = Db::getConnection();
        $config = new PHPAuth\Config($dbh);
        $auth = new PHPAuth\Auth($dbh, $config, $language = "ru_RU");
        
        $result = false;    
            
        if (isset($_POST['submit'])) {
            $key = $_POST['key'];
            $result = $auth->activate($key);
        }
        return $this->render('user/activate', ['result' => $result]);
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
        
        header("Location: /user/login");
    }
    public  function actionRequestReset()
    {
        $dbh = Db::getConnection();
        $config = new PHPAuth\Config($dbh);
        $auth = new PHPAuth\Auth($dbh, $config, $language = "ru_RU");
        
        $result = false;
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $result = $auth->requestReset($email);
        }
        
       return $this->render('user/request_reset', ['title' => 'Сброс пароля',
                                           'result' => $result]);
    }
    
    public  function actionReset()
    {
        $dbh = Db::getConnection();
        $config = new PHPAuth\Config($dbh);
        $auth = new PHPAuth\Auth($dbh, $config, $language = "ru_RU");
        
        $result = false;
        
        if (isset($_POST['submit'])) {
            $key = $_POST['key'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            
            $result = $auth->resetPass($key, $password, $confirm_password);
        }
       return $this->render('user/reset', ['title' => 'Сброс пароля',
                                           'result' => $result]);
    }
    
}
