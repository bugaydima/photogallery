<?php
/**
 * Класс Category - модель для работы с категориями товаров
 * @author Dima
 */
class Category {
    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getCategoryList(){
        
        $db = Db::getConnection();
        
        $categoryList = array();
        
        $result = $db->query('SELECT `id`, `name`, `url` FROM category '
                . 'WHERE status = "1" AND parent_id = "0"'
                . 'ORDER BY `sort_order`, `name` ASC');
        
        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['url'] = $row['url'];
            $i++;
        }
        return $categoryList;
    }
    public static function getCategoryGallery(){
        
        $db = Db::getConnection();
        
        $menuGallery = [];
        
        $result = $db->query('SELECT id, `name`, url FROM category WHERE parent_id = "4" AND `status` = "1" ORDER BY sort_order');
        
        $i = 0;
        while ($row = $result->fetch()){
            $menuGallery[$i]['id'] = $row['id'];
            $menuGallery[$i]['name'] = $row['name'];
            $menuGallery[$i]['url'] = $row['url'];
            $i++;
        }
        return $menuGallery;
    }
    public static function getAllCategoryGallery(){
        
        $db = Db::getConnection();
        
        $allGallery = [];
        
        $result = $db->query('SELECT id, `name`, url, status, sort_order FROM category WHERE parent_id = "4" AND `status` = "1"');
        
        $i = 0;
        while ($row = $result->fetch()){
            $allGallery[$i]['id'] = $row['id'];
            $allGallery[$i]['name'] = $row['name'];
            $allGallery[$i]['url'] = $row['url'];
            $allGallery[$i]['status'] = $row['status'];
            $allGallery[$i]['sort_order'] = $row['sort_order'];
            $i++;
        }
        return $allGallery;
    }
    public static function getAdminCategoryGallery(){
        
        $db = Db::getConnection();
        
        $allGallery = [];
        
        $result = $db->query('SELECT id, `name`, url, status, sort_order FROM category WHERE parent_id = "4"');
        
        $i = 0;
        while ($row = $result->fetch()){
            $allGallery[$i]['id'] = $row['id'];
            $allGallery[$i]['name'] = $row['name'];
            $allGallery[$i]['url'] = $row['url'];
            $allGallery[$i]['status'] = $row['status'];
            $allGallery[$i]['sort_order'] = $row['sort_order'];
            $i++;
        }
        return $allGallery;
    }
    public static function getTotalCategory()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM category WHERE parent_id=4';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        // Выполнение коменды
        $result->execute();
        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }
    
    public static function createCategory($name, $sortOrder, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO category (name, parent_id, sort_order, status) '
                . 'VALUES (:name, 4, :sort_order, :status)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
        /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM category WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Возвращает текстое пояснение статуса для категории :<br/>
     * <i>0 - Скрыта, 1 - Отображается</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрытый';
                break;
        }
    }
}
