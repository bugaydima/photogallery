<?php
/**
 * Класс User - модель для работы с пользователями
 * @author Dima
 */
class User {
     /**
     * Возвращает данные пользователя, если он авторизирован.<br/>
     * Иначе перенаправляет на страницу входа
     * @return string <p>Идентификатор пользователя</p>
     */
    public static function checkLogged()
    {
        $dbh = Db::getConnection();

        $config = new PHPAuth\Config($dbh);
        $auth = new PHPAuth\Auth($dbh, $config);

        if (!$auth->isLogged()) {
            header("Location: /user/login");
        }
        $userHash = $auth->getSessionHash();
        $userId = $auth->getSessionUID($userHash);
        
        return $user = $auth->getUser($userId);
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkName($name){
        
        if (mb_strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    /**
     * Проверяет имя: не меньше, чем 6 символов
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkPassword($password){
        
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    public static function getAllUser($count = self::SHOW_BY_DEFAULT, $page = 1)
    {
        $offset = ($page - 1) * $count;
    // Соединение с БД
        $db = Db::getConnection();
        $sql = 'SELECT `id`, `email`, `username`, `role`, `isactive`'
             .' FROM users '
             . 'ORDER BY id ASC LIMIT :count OFFSET :offset';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $users = array();
        while ($row = $result->fetch()) {
            $users[$i]['id'] = $row['id'];
            $users[$i]['email'] = $row['email'];
            $users[$i]['username'] = $row['username'];
            $users[$i]['role'] = $row['role'];
            $users[$i]['isactive'] = $row['isactive'];
            $i++;
        }
        return $users;
    }
    public static function getTotalUsers() 
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM users';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Выполнение коменды
        $result->execute();
        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Активирован';
                break;
            case '0':
                return 'Не активирован';
                break;
        }
    }
    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, username, isactive, role FROM users WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function UserUpdateById($id, $username, $role, $isactive)
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE users
                SET
                   `username` = :username,
                    `role` = :role,
                    `isactive` = :isactive
                WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        $result->bindParam(':isactive', $isactive, PDO::PARAM_INT);
        //$result->execute();
        if (!$result->execute()) {
            throw new Exception('Произошел сбой при изменении.');
    }
        return true;
    }
    public static function getUserConfig()
    {
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "SELECT `setting`, `value` FROM config";
        
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $config = array();
        while ($row = $result->fetch()) {
            $config[$i]['setting'] = $row['setting'];
            $config[$i]['value'] = $row['value'];
            $i++;
        }
        return $config;
    }
}
################################################################################
#                  Старые методы аутентификации пользователя                   #
################################################################################
/**
     * Регистрация пользователя 
     * @param string $name <p>Имя</p>
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
 /*   public static function register($name, $email, $password){
                // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    } 
  */
    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $email <p>E-mail</p>
     * @param string $password <p>Пароль</p>
     * @return mixed : integer user id or false
     */
/*     public static function checkUserData($email, $password)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();
        // Обращаемся к записи
        $user = $result->fetch();
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id'];
        }
        return false;
    }
 */
    /**
     * Запоминаем пользователя
     * @param integer $userId <p>id пользователя</p>
     */
/*    public static function auth($userId)
    {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }
*/
    /**
     * Проверяет email
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
/*    public static function checkEmail($email){
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
*/
    /**
     * Проверяет не занят ли email другим пользователем
     * @param type $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
/*    public static function checkEmailExists($email)
    {
        // Соединение с БД        
        $db = Db::getConnection();
        
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
*/
    /**
     * Возвращает пользователя с указанным id
     * @param integer $id <p>id пользователя</p>
     * @return array <p>Массив с информацией о пользователе</p>
     */
/*    public static function getUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM user WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
*/