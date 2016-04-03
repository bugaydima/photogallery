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
    
    
    
    
    
    
    
    //    public static function getCategoryList2(){
//        
//        $db = Db::getConnection();
//        
//        $categoryList2 = array();
//        
//        $result = $db->query('SELECT `id`, `name`, url, `parent_id` FROM category '
//                . 'WHERE status = "1" '
//                . 'ORDER BY `sort_order` ASC');
//
//        $i = 1;
//        while ($row = $result->fetch()){
//            $categoryList2[$row['id']]['id'] = $row['id'];
//            $categoryList2[$row['id']]['name'] = $row['name'];
//            $categoryList2[$row['id']]['url'] = $row['url'];
//            $categoryList2[$row['id']]['parent_id'] = $row['parent_id'];
//            $i++;
//        }
//        return $categoryList2;
//    }
//    
//    public static function mapTree($categories3) {
//
//        $tree = array();
//
//        foreach ($categories3 as $id => &$node) {
//
//            if (!$node['parent_id']) {
//                $tree[$id] = &$node;
//            } else {
//                $categories3[$node['parent_id']]['children'][$id] = &$node;
//            }
//        }
//        unset($node);
//        return $tree;
//    }
}
