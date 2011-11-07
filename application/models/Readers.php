<?php

/**
 * Readers
 * 
 * Работа с читателями
 * 
 */
 
class Readers extends Zend_Db_Table_Abstract {

    /**
     * Имя таблицы
     * @var string
     */        
    protected $_name = 'Readers';
    
    /**
     * Получить читатилей либо читателя
     * @param int $id id читателя
     * @return array
     */
    public function selectReaders($id = null) {

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
     * Добавление читателя
     * @param array $data данные читателя
     * @return true
     */
    public function insertReader($data) {
    
        // Проверяем значение даты
        if($data['datebirth']) {
            // Разбеваем струку в массив для преобразования
            $temp = explode('.', $data['datebirth']);
            // Преобразовываем дату в число
            $data['datebirth'] = mktime(0, 0, 0, $temp[1], $temp[0], $temp[2]);
        }
    
        // Вызываем метод который добавляет данные
        parent::insert($data);
        
        return true;
    
    }
    
    /**
     * Удаление читателя
     * @param int $id id читателя
     * @return true
     */
    public function deleteReader($id) {
        
        if(!$this->existsIdReader($id)) return false;
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        //Удоляем категорию
        parent::delete($sql);
        
        return true;
        
    }
    
    /**
     * Редоктирование читателя
     * @param int $id id читателя
     * @param array $data данные читателя
     * @return true
     */
    public function updateReader($id, $data) {
        
        // Проверяем значение даты
        if($data['datebirth']) {
            // Разбеваем струку в массив для преобразования
            $temp = explode('.', $data['datebirth']);
            // Преобразовываем дату в число
            $data['datebirth'] = mktime(0, 0, 0, $temp[1], $temp[0], $temp[2]);
        }
        
        // Делаем запрос
        $sql = $this->getAdapter()->quoteInto('id = ?', $id);
        
        // Обновляем данные
        parent::update($data, $sql);
        
        return true;
    }
    
    /**
     * Проверка читателя по id
     * @param int $id id читателя
     * @return bool
     */
    public function existsIdReader($id) {
    
        // Делаем запрос
        $sql = $this->select()
                    ->where('id = ?', $id);
        // Проверяем существует читатель
        $result = $this->fetchAll($sql)->count() > 0 ? true : false;
    
        return $result;
        
    }
    
    /**
     * Вход в систему
     * @param string $email email читателя
     * @param string $password пароль читателя
     * @return bool
     */
    public function login($email, $password)
    {
        // Получить экземпляр Zend_Auth
        $auth = Zend_Auth::getInstance();
        
        // Создаем Adapter для Zend_Auth, указывая ему где в БД искать email и пароль для сравнения
        $authAdapter = new Zend_Auth_Adapter_DbTable($this->getAdapter(), 'Readers', 'email', 'password', 'MD5(?)');

        $authAdapter->setIdentity($email)
                    ->setCredential($password);

        // Сохраняет результат проверки
        $result = $auth->authenticate($authAdapter);
        
        // Проверка
        if($result->isValid()) {
            
            // Можно записать в сессию некоторые поля но мы записываем все
            $auth->getStorage()->write($authAdapter->getResultRowObject());
            
            // Получить объект Zend_Session_Namespace
            $session = new Zend_Session_Namespace('Zend_Auth');
            // Установить время действия залогинености
            $session->setExpirationSeconds(24*3600);
            // Запомнить на долго в cookies
            Zend_Session::rememberMe(24*3600*30);
            
            return true;
        }
        
        return false;
    }
    
    /**
     * Получить читателя для обновления сессии
     * @param int $id id читателя
     * @return array
     */
    public function getReaderByIdS($id) {

        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Условие на выборку
            ->where("id = ?", $id); 
        
        // Выполнение запроса
        $stmt = $this->getAdapter()->query($sql);
        // Получение данных в виде массива объектов, по умолчанию в виде массива ассоциативных массивов
        $result = $stmt->fetchAll(Zend_Db::FETCH_OBJ);
        
        return $result[0];
        
    }
    
    /**
     * Получить читателя с заменой полей
     * @param int $id id читателя
     * @return array
     */
    public function selectReaderFull($id) {        
        // Создаем объект Zend_Db_Select
        $sql = $this->getAdapter()->select()
            // Таблица из которой делается выборка
            ->from($this->_name)
            // Условие на выборку
            ->where("id = ?", $id); 
            // Выполнение запроса
            
            $stmt = $this->getAdapter()->query($sql);
            // Получение данных
            $result = $stmt->fetch();
            
            if(count($result)) {
            
                // Преобразовуем дату в строку dd.MM.yyyy
                if($result['datebirth']) {
                    $temp = getdate($result['datebirth']);

                    $result['datebirth'] = (strlen($temp['mday']) == 2) ? $temp['mday'] . '.' : '0' . $temp['mday'] . '.';
                    $result['datebirth'] .= (strlen($temp['mon']) == 2) ? ($temp['mon']) . '.' . $temp['year'] : '0' . ($temp['mon']) . '.' . $temp['year'];
                }
                
                // Преобразовуем пол
                $result['sex'] = ($result['sex'] == 'm') ? 'Мужской' : 'Женский';
            }
        
        return $result;

    }
    
}

