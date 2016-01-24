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
    
    public static function getMenuGallery(){
        
        $db = Db::getConnection();
        
        $menuGallery = [];
        
        $result = $db->query('SELECT id, `name`, url FROM category WHERE parent_id = "4" AND `status` = "1"');
        
        $i = 0;
        while ($row = $result->fetch()){
            $menuGallery[$i]['id'] = $row['id'];
            $menuGallery[$i]['name'] = $row['name'];
            $menuGallery[$i]['url'] = $row['url'];
            $i++;
        }
        return $menuGallery;
    }
}
