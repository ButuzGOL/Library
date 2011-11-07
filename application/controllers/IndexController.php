<?php

/**
 * IndexController
 * 
 * Главный контроллер сайта
 * 
 */

class IndexController extends Zend_Controller_Action 
{

    /**
     * Отображает главную страницу
     */
    public function indexAction() {
        
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Получение параметра - страницу
        $page = $this->_getParam('pageId');
        if($page == null) $page = 0;
        
        // Создаем модель книг
        $modelbooks = $Books->selectBooksFull(null, $page);
        
        // Передаем модель книг в скрипт вида
        $this->view->books = $modelbooks;
        
        // Передаем страницу
        $this->view->page = $page;
        
        // Передаем сколько книг всего
        $this->view->countpages = ceil(count($Books->selectBooks()) / 2);
        
    }
    
    /**
     * О книге
     */
    public function binfoAction() {
    
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Получение параметра - id книги
        $id = $this->_getParam('Id');
        
        // Проверка id
        if(!$Books->existsIdBook($id)) {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Книга не найдена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'default');
        }
        
        // Создаем модель книги
        $modelbook = $Books->selectBooksFull($id);
              
        // Передаем модель книги в скрипт вида
        $this->view->book = $modelbook;
        
    }
    
    /**
     * Отображает главную страницу
     */
    public function categoryAction() {
        
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Инициализируем объект отвечающий за работу с категориями
        $Categories = new Categories();
    
        // Получение id - категории
        $id = $this->_getParam('Id');
        
        // Проверка id
        if(!$Categories->existsIdCategory($id)) {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Категория не найдена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'default');
        }
        
        // Создаем модель книг
        $modelbooks = $Books->selectBooksFull(null, null, $id);
        
        // Передаем модель книг в скрипт вида
        $this->view->books = $modelbooks;
        
        // Передаем страницу
        $this->view->page = $page;
        
        // Передаем сколько книг всего
        $this->view->countpages = ceil(count($Books->selectBooks()) / 2);
        
    }
    
    /**
     * О читателе
     */
    public function rinfoAction() {
    
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
            $this->_helper->redirector->gotoRoute(array(), 'default');
        }
        
        // Проверка свою информацию смотрите
        if(Zend_Auth::getInstance()->getIdentity()->id != $id) {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Вы только можете смотреть информацию о себе');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'default');
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
