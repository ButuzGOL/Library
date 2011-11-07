<?php

/**
 * Categories
 * 
 * Работа с категориями
 * 
 */
 
class Categories extends Zend_Db_Table_Abstract {

    /**
     * Имя таблицы
     * @var string
     */
    protected $_name = 'Categories';
    
    /**
     * Получить категории либо категорию
     * @param int $id id категории
     * @return array
     */
    public function selectCategories($id = null) {

        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Порядок сортировки
            ->order('id DESC')
            ;
        
        if (!is_null($id)) {
            // Условие на выборку
            $sql->where("id = ?", $id); 
            // Выполнение запроса
            $stmt = $this->getAdapter()->query($sql);
            // Получение данных
            $result = $stmt->fetch();
        }
        else {
            // Выполнение запроса
            $stmt = $this->getAdapter()->query($sql);
            // Получение данных в виде массива объектов, по умолчанию в виде массива ассоциативных массивов
            $result = $stmt->fetchAll(Zend_Db::FETCH_OBJ);
        }
        
        return $result;

    }
    
    /**
     * Добавление категории
     * @param array $date данные категории
     * @return true
     */
    public function insertCategory($data) {
    
        // Вызываем метод который добавляет данные
        parent::insert($data);
        
        return true;
    
    }
    
    /**
     * Удаление категории
     * @param int $id id категории
     * @return true
     */
    public function deleteCategory($id) {
        
        if(!$this->existsIdCategory($id)) return false;
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        //Удоляем категорию
        parent::delete($sql);
        
        return true;
        
    }
    
    /**
     * Редоктирование категории
     * @param int $id id категории
     * @param array $date данные категории
     * @return true
     */
    public function updateCategory($id, $data) {
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        // Обновляем данные
        parent::update($data, $sql);
        
        return true;
    }
    
    /**
     * Проверка категории по id
     * @param int $id id категории
     * @return bool
     */
    public function existsIdCategory($id) {
    
        // Делаем запрос
        $sql = $this->select()
                    ->where('id = ?', $id);
        // Проверяем существует категория
        $result = $this->fetchAll($sql)->count() > 0 ? true : false;
    
        return $result;
        
    }
    
    /**
     * Получаем имя категории по id
     * @param int $id id категории
     * @return string
     */
    public function getName($id) {
    
        // Делаем запрос
        $sql = $this->select('name')
                    ->where('id = ?', $id);
        // Проверяем существует категория
        $stmt = $this->getAdapter()->query($sql);
        
        // Получение данных
        $result = $stmt->fetch();
        
        return $result['name'];
        
    }
}

