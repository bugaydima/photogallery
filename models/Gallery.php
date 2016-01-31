<?php
/**
 * Класс Gallery - модель для работы с галереей 
 * @author Dima
 */
class Gallery{
    // Количество отображаемых фотографий по умолчанию
    const SHOW_BY_DEFAULT = 8;

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
}

