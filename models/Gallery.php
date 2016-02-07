<?php
/**
 * Класс Gallery - модель для работы с галереей 
 * @author Dima
 */
class Gallery{
    // Количество отображаемых фотографий по умолчанию
    const SHOW_BY_DEFAULT = 8;

    public static function getAllPhotosByAdmin($count = self::SHOW_BY_DEFAULT, $page = 1){
        
        $offset = ($page - 1) * $count;
    // Соединение с БД
        $db = Db::getConnection();
        $sql = 'SELECT id, `name`, `category_id` FROM photos '
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
        $photosList = array();
        while ($row = $result->fetch()) {
            $photosList[$i]['id'] = $row['id'];
            $photosList[$i]['name'] = $row['name'];
            $photosList[$i]['category_id'] = $row['category_id'];
            $i++;
        }
        return $photosList;
    }
   public static function getAllPhotos($count = self::SHOW_BY_DEFAULT){
        
    // Соединение с БД
        $db = Db::getConnection();
        
        $sql = 'SELECT id, `name` FROM photos '
                                . 'LIMIT :count';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $photosList = array();
        while ($row = $result->fetch()) {
            $photosList[$i]['id'] = $row['id'];
            $photosList[$i]['name'] = $row['name'];
            $i++;
        }
        return $photosList;
    } 
    public static function getPhotoListByCategoryId($categoryId){
        
        $db = Db::getConnection();
        
        $sql = 'SELECT id, `name` '
             . 'FROM photos '
             . 'WHERE category_id = :category_id ';
                
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $photo = array();
        while ($row = $result->fetch()) {
            $photo[$i]['id'] = $row['id'];
            $photo[$i]['name'] = $row['name'];
            $i++;
        }
        return $photo;
        
    }
        public static function getTotalPhoto()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM photos';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Выполнение коменды
        $result->execute();
        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }
    public static function deletePhotoById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM photos WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}

