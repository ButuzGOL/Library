<?php

/**
 * TRBooks
 * 
 * Работа с выдачей и возвратом книг
 * 
 */
 
class TRBooks extends Zend_Db_Table_Abstract {

    /**
     * Имя таблицы
     * @var string
     */
    protected $_name = 'TRBooks';
    
    /**
     * Получить книги либо книгу
     * @param int $readerid id читателя
     * @param int $bookid id книги
     * @return array
     */
    public function selectTR($readerid, $bookid) {

        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Условие на выборку
            ->where("readerid = ?", $readerid)
            // Условие на выборку
            ->where("bookid = ?", $bookid)
            ;
        
            // Выполнение запроса
            $stmt = $this->getAdapter()->query($sql);
            // Получение данных
            $result = $stmt->fetch();
        
        return $result;

    }
    
    /**
     * Добавление записи о выдаче книг
     * @param int $readerid id читателя
     * @param int $bookid id книги
     * @param int $count кол-во книг
     * @return true
     */
    public function insertTRBook($readerid, $bookid, $count) {
        
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Создаем модель книг
        $modelbook = $Books->selectBooks($bookid);
        
        if($count <= 0 || ($modelbook['count'] - $count) < 0) return false;
        
        $modelbook['count'] -= $count;
        
        // Обновляем книгу
        $Books->updateBookS($modelbook['id'], $modelbook);
        
        // Проверяем существует ли запись
        $data = $this->selectTR($readerid, $bookid);
        
        if($data['id']) {
            $data['count'] += $count;
            $data['datet'] = time();
            
            // Делаем запрос
            $sql = $this->getAdapter()->quoteInto('id = ?', $data['id']);
        
            // Обновляем данные
            parent::update($data, $sql);
        }
        else {
            
            $data = array(
                'readerid' => $readerid,
                'bookid'   => $bookid,
                'count'    => $count,
                'datet'    => time(),
                'dater'    => '',
            );
            
            // Вызываем метод который добавляет данные
            parent::insert($data);
        }
        
        return true;
    
    }
    
    /**
     * Получить книги
     * @param int $readerid id читателя
     * @return array
     */
    public function selectTRBooks($readerid) {

        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Условие на выборку
            ->where("readerid = ?", $readerid)
            // Условие на выборку
            ->where("count <> ?", 0)
            ;

        // Выполнение запроса
        $stmt = $this->getAdapter()->query($sql);
        // Получение данных в виде массива объектов, по умолчанию в виде массива ассоциативных массивов
        $modeltrbooks = $stmt->fetchAll(Zend_Db::FETCH_OBJ);
        
        // Строим модел взятых книг пользователем
        if(count($modeltrbooks)) {
             
            $idstr = ',';
            foreach ($modeltrbooks as $r)
                $idstr .= $r->bookid . ',';
            
            // Инициализируем объект отвечающий за работу с книгиами
            $Books = new Books();
            // Создаем модель книги
            $modelbooks = $Books->selectBooksFull(null, null, null, false, null, $idstr);
            foreach ($modelbooks as $book) {
                foreach ($modeltrbooks as $r)
                    if($book->id == $r->bookid) {
                        $temp = $r->count;
                        $temp1 = $r->datet;
                    }
                $book->tcount = $temp;
            
                // Преобразовуем дату в строку dd.MM.yyyy
                $temp = getdate($temp1);

                $book->datet = (strlen($temp['mday']) == 2) ? $temp['mday'] . '.' : '0' . $temp['mday'] . '.';
                $book->datet .= (strlen($temp['mon']) == 2) ? ($temp['mon']) . '.' . $temp['year'] : '0' . ($temp['mon']) . '.' . $temp['year'];
            }
        }        
        return $modelbooks;

    }
    
    /**
     * Добавление запии о приеме книг
     * @param int $readerid id читателя
     * @param int $bookid id книги
     * @param int $count кол-во книг
     * @return true
     */
    public function deleteTRBook($readerid, $bookid, $count) {
        
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Создаем модель книг
        $modelbook = $Books->selectBooks($bookid);
        
        if($count <= 0) return false;
        
        $modelbook['count'] += $count;
        
        // Обновляем книгу
        $Books->updateBookS($modelbook['id'], $modelbook);
        
        // Проверяем существует ли запись
        $data = $this->selectTR($readerid, $bookid);
        
        $data['count'] -= $count;
        $data['dater'] = time();
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $data['id']);
    
        // Обновляем данные
        parent::update($data, $sql);
        
        return true;
    
    }

}

