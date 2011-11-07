<?php

/**
 * Books
 * 
 * Работа с книгами
 * 
 */
 
class Books extends Zend_Db_Table_Abstract {

    /**
     * Имя таблицы
     * @var string
     */        
    protected $_name = 'Books';
    
    /**
     * Получить книги либо книгу
     * @param int $id id книги
     * @return array
     */
    public function selectBooks($id = null) {

        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Порядок сортировки
            ->order('id DESC')
            ;
        
        if(!is_null($id)) {
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
     * Добавление книги
     * @param array $data данные книги
     * @return true
     */
    public function insertBook($data) {
    
        // Вызываем метод который добавляет данные
        parent::insert($data);
        
        // Узнаем последний id
        $lastid = $this->getAdapter()->lastInsertId();
        
        // Обновляем ячейку отвечающую за картинку книги
        $this->updateBook($lastid, $data);
        
        return true;
    
    }
    
    /**
     * Удаление книги
     * @param int $id id книги
     * @return true
     */
    public function deleteBook($id) {
        
        if(!$this->existsIdBook($id)) return false;
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        //Удаляем книгу с базы
        parent::delete($sql);
        
        // Удаляем картинку
        @unlink(BASE_DIR . 'uploads/' . $id . '.jpg');
        
        return true;
        
    }
    
    /**
     * Редоктирование книги
     * @param int $id id книги
     * @param array $data данные книги
     * @return true
     */
    public function updateBook($id, $data) {
        
        // Преобразовуем массив категорий в строку
        if(@in_array('0', $data['categoryid'])) $data['categoryid'] = '0';
        else $data['categoryid'] = @implode(',', $data['categoryid']);
                
        // Проверяем значение даты
        if($data['datecome']) {
            // Разбеваем струку в массив для преобразования
            $temp = explode('.', $data['datecome']);
            // Преобразовываем дату в число
            $data['datecome'] = mktime(0, 0, 0, $temp[1], $temp[0], $temp[2]);
        }
        else $data['datecome'] = time();
        
            
        // Переименоваем картинку
        @rename(BASE_DIR . 'uploads/' . $data['img'], BASE_DIR . 'uploads/' . $id . '.jpg');
        
        // Делаем массив для обновления
        $data['img'] = $id . '.jpg';
            
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        // Обновляем данные
        parent::update($data, $sql);
        
        return true;
    }
    
    /**
     * Проверка книги по id
     * @param int $id id книги
     * @return bool
     */
    public function existsIdBook($id) {
    
        // Делаем запрос
        $sql = $this->select()
                    ->where('id = ?', $id);
        // Проверяем существует книга
        $result = $this->fetchAll($sql)->count() > 0 ? true : false;
    
        return $result;
        
    }
    
    /**
     * Получить книги либо книгу с заменой полей
     * @param int $id id книги
     * @param $page страница
     * @param $category категория
     * @param $bookmark закладка
     * @param $bookmarkid id закладки
     * @param $idstr данные книги id строка
     * @return array
     */
    public function selectBooksFull($id = null, $page = null, $category = null, $bookmark = false, $bookmarkid = null, $idstr = null) {        
        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Порядок сортировки
            ->order('id DESC')
            ;
            
        if(!is_null($page)) 
            // Количество книг страницы
            $sql->limit(2, $page * 2);
        
        if(!is_null($category)) 
            // Котегория книг
            $sql->where('locate(",' . $category . ',", concat(",",categoryid,","))>0');
        
        if(!is_null($idstr))
            // Взятые книги
            $sql->where('locate(concat(",",id,","), "' . $idstr . '")>0');
        
        if(!is_null($id)) {
            // Условие на выборку
            $sql->where("id = ?", $id); 
            // Выполнение запроса
            $stmt = $this->getAdapter()->query($sql);
            // Получение данных
            $result = $stmt->fetch();
            
            if(count($result)) {
                
                // Инициализируем объект отвечающий за работу с категориями
                $Categories = new Categories();
            
                // Преобразовуем дату в строку dd.MM.yyyy
                if($result['datecome']) {
                    $temp = getdate($result['datecome']);

                    $result['datecome'] = (strlen($temp['mday']) == 2) ? $temp['mday'] . '.' : '0' . $temp['mday'] . '.';
                    $result['datecome'] .= (strlen($temp['mon']) == 2) ? ($temp['mon']) . '.' . $temp['year'] : '0' . ($temp['mon']) . '.' . $temp['year'];
                }
                
                // Преобразовуем категории
                if($result['categoryid']) {
                    $temp = explode(',', $result['categoryid']);
                    $strtemp = '';
                    for ($i = 0; $temp[$i]; $i++) {
                        $categoryname = $Categories->getName($temp[$i]);
                        if($categoryname)
                            $strtemp .= $categoryname . ', ';
                    }
                    $result['categoryid'] = substr($strtemp, 0, -2);
                }
                else $result['categoryid'] = '';
                
                // Проверяем существует ли картинка
                if(!@fopen(BASE_DIR . 'uploads/' . $result['img'], 'r')) $result['img'] = '0.jpg';
                
                // Инициализируем объект отвечающий за работу с закладками
                $Bookmarks = new Bookmarks();
                
                $result['bookmark'] = ($Bookmarks->existsBookmark($id)) ? 'minus' : 'plus';
            
                if(!$result['fullstory']) $result['fullstory'] = $result['shortstory'];
            }
            
        }
        else {
            // Выполнение запроса
            $stmt = $this->getAdapter()->query($sql);
            // Получение данных в виде массива объектов, по умолчанию в виде массива ассоциативных массивов
            $result = $stmt->fetchAll(Zend_Db::FETCH_OBJ);
        
            if(count($result)) {
            
                // Создаем временный массив
                $modeltemp = array();
                
                // Инициализируем объект отвечающий за работу с категориями
                $Categories = new Categories();
                // Инициализируем объект отвечающий за работу с закладками
                $Bookmarks = new Bookmarks();
                foreach ($result as $r) {
                    
                    // Преобразовуем дату в строку dd.MM.yyyy
                    if($r->datecome) {
                        $temp = getdate($r->datecome);

                        $r->datecome = (strlen($temp['mday']) == 2) ? $temp['mday'] . '.' : '0' . $temp['mday'] . '.';
                        $r->datecome .= (strlen($temp['mon']) == 2) ? ($temp['mon']) . '.' . $temp['year'] : '0' . ($temp['mon']) . '.' . $temp['year'];
                    }
                    
                    // Преобразовуем категории
                    if($r->categoryid) {
                        $temp = explode(',', $r->categoryid);
                        $strtemp = '';
                        for ($i = 0; $temp[$i]; $i++) {
                            $categoryname = $Categories->getName($temp[$i]);
                            if($categoryname)
                                $strtemp .= $categoryname . ', ';
                        }
                        $r->categoryid = substr($strtemp, 0, -2);
                    }
                    else $r->categoryid = '';
                    
                    // Проверяем существует ли картинка
                    if(!@fopen(BASE_DIR . 'uploads/' . $r->img, 'r')) $r->img = '0.jpg';
                    
                    $r->bookmark = ($Bookmarks->existsBookmark($r->id, $bookmarkid)) ? 'minus' : 'plus';
                    
                    if(($r->bookmark == 'minus' && $bookmark == true) || $bookmark == false)
                        // Забеваем массив
                        array_push($modeltemp, $r);
                }
            
            // Переписываем основной массив
            $result = $modeltemp;
            }
        }
        
        return $result;

    }
    
    /**
     * Редоктирование книги простое
     * @param int $id id книги
     * @param $data данные книги
     * @return true
     */
    public function updateBookS($id, $data) {
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        // Обновляем данные
        parent::update($data, $sql);
        
        return true;
    }
    

}

