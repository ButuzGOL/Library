<?php

/**
 * Bookmarks
 * 
 * Работа с закладками
 * 
 */
 
class Bookmarks extends Zend_Db_Table_Abstract {

    /**
     * Имя таблицы
     * @var string
     */        
    protected $_name = 'Bookmarks';
    
    /**
     * Получить книги либо книгу
     * @param int $id id закладки
     * @return true
     */
    public function orAddDel($id) {

        $readerid = Zend_Auth::getInstance()->getIdentity()->id;
        
        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select('id')
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Проверка если уже закладка
            ->where('readerid = ?', $readerid)
            ->where('bookid = ?', $id)
            ;
        
        // Проверяем существует закладка
        $stmt = $this->getAdapter()->query($sql);
        
        // Получение данных
        $result = $stmt->fetch();
        
        if($result['id']) {
            
            // Делаем запрос
            $sql = $this->getAdapter()->quoteInto('id = ?', $result['id']);
        
            //Удоляем закладку
            parent::delete($sql);
            
        }
        else { 
            
            $data = array(
                    'readerid' => $readerid,
                    'bookid'   => $id,
            );
            
            // Вызываем метод который добавляет данные
            parent::insert($data);
        }
        
        return true;

    }
    
    /**
     * Проверка закладки по id
     * @param $id id записи
     * @param $readerid id читателя
     * @return bool
     */
    public function existsBookmark($id, $readerid = null) {
        
        if(is_null($readerid)) $readerid = Zend_Auth::getInstance()->getIdentity()->id;
        
        if(!$readerid) return;
        
        // Делаем запрос
        $sql = $this->select()
                    ->where('readerid = ?', $readerid)
                    ->where('bookid = ?', $id);
                    
        // Проверяем существует книга
        $result = $this->fetchAll($sql)->count() > 0 ? true : false;
    
        return $result;
        
    }
    }

