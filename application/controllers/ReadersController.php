<?php

/**
 * ReadersController
 * 
 * Работа с читателями
 * 
 */

class ReadersController extends Zend_Controller_Action {
    
    /**
     * Проверка доступа
     */
     public function preDispatch() {
       
        if(Zend_Auth::getInstance()->getIdentity()->status != '0') {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Доступ закрыт');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'default');
        }
    }
    
    /**
     * Список читателей
     */
    public function indexAction() {
    
        // Инициализируем объект отвечающий за работу с читателями
        $Readers = new Readers();
        
        // Создаем модель категорий
        $modelreaders = $Readers->selectReaders();
        // Передаем модель категорий в скрипт вида
        $this->view->readers = $modelreaders;
        
    }
    
    /**
     * Добавление читателя
     */
    public function addAction() {
        
        // Инициализируем форму добавления читателя
        $AddReader = new Forms_AddReader();
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
            
            // Проверяем на валидность поля формы
            if($AddReader->isValid($this->_getAllParams())) {
                
                // Инициализируем объект отвечающий за работу с читателями
                $Readers = new Readers();
                
                // Формируем масив для вставки в базу данных
                $data = array(
                    'sername'   => $AddReader->getValue('sername'),
                    'name'      => $AddReader->getValue('name'),
                    'datebirth' => $AddReader->getValue('datebirth'),
                    'address'   => $AddReader->getValue('address'),
                    'contphone' => $AddReader->getValue('contphone'),
                    'sex'       => $AddReader->getValue('sex'),
                    'email'     => $AddReader->getValue('email'),
                    'password'  => md5($AddReader->getValue('password')),
                    'status'    => '1',
                );
                
                // Вставляем данные в базу данных
                $Readers->insertReader($data);
    
                // Задаем сообщение
                $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Читатель добавлен');
                // Задаем тип сообщения
                $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                // Перенаправление
                $this->_helper->redirector->gotoRoute(array(), 'readers');
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->addReader = $AddReader;
        
    }
    
    /**
     * Редоктирование читателя
     */
    public function updateAction() {
        
        // Инициализируем объект отвечающий за работу с читателями
        $Readers = new Readers();
        
        // Получение параметра - id читателя
        $id = $this->_getParam('Id');
       
        // Проверка id
        if(!$Readers->existsIdReader($id)) {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Читатель не найден');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'readers');
        }
        
        // Создаем модель читателя
        $modelreader = $Readers->selectReaders($id);
        
        // Инициализируем форму
        $UpdateReader = new Forms_UpdateReader();
        // Передача модели
        $UpdateReader->init($modelreader);
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
            
            // Проверяем на валидность поля формы
            if($UpdateReader->isValid($this->_getAllParams())) {
                                if($UpdateReader->getValue('password')) $password = md5($UpdateReader->getValue('password'));
                else $password = $modelreader['password'];
                
                // Формируем масив для вставки в базу данных
                $data = array(
                    'sername'   => $UpdateReader->getValue('sername'),
                    'name'      => $UpdateReader->getValue('name'),
                    'datebirth' => $UpdateReader->getValue('datebirth'),
                    'address'   => $UpdateReader->getValue('address'),
                    'contphone' => $UpdateReader->getValue('contphone'),
                    'sex'       => $UpdateReader->getValue('sex'),
                    'email'     => $UpdateReader->getValue('email'),
                    'password'  => $password,
                );
                
                // Вставляем данные в базу данных
                $Readers->updateReader($modelreader['id'], $data);
    
                // Задаем сообщение о успешной регистрации
                $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Читатель обновлен');
                // Задаем тип сообщения
                $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                // Перенаправление на главную страницу
                $this->_helper->redirector->gotoRoute(array(), 'readers');
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->updateReader = $UpdateReader;
    
    }
    
    /**
     * Удаление читателя
     */
    public function deleteAction() {
    
        // Инициализируем объект отвечающий за работу с читателями
        $Readers = new Readers();
        
        // Получение параметра - id читателя
        $id = $this->_getParam('Id');
        
        // Проверка id
        if($Readers->existsIdReader($id)) {
            // Удаление читателя
            $Readers->deleteReader($id);
            
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Читатель удален');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
        }
        else {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Читатель не найден');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
        }
        // Перенаправление
        $this->_helper->redirector->gotoRoute(array(), 'readers');
    }
    
    /**
     * Bывод читателя
     */
    public function infoAction() {
    
        // Инициализируем объект отвечающий за работу с читателями
        $Readers = new Readers();
        
        // Получение параметра - id читателя
        $id = $this->_getParam('Id');
        
        // Проверка id
        if(!$Readers->existsIdReader($id)) {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Читатель не найден');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'books');
        }
        
        // Создаем модель читателя
        $modelreader = $Readers->selectReaderFull($id);
        
        // Передаем модель читателя в скрипт вида
        $this->view->reader = $modelreader;
        
        // Инициализируем объект отвечающий за прием и выдачю книг
        $TRBooks = new TRBooks();
                
        // Получаем модуль взятых книг
        $modelbooks = $TRBooks->selectTRBooks($id);
                
        // Передаем модель книг в скрипт вида
        $this->view->books = $modelbooks;
        
    }
    
}
