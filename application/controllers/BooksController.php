<?php

/**
 * BooksController
 * 
 * Работа с книгами
 * 
 */

class BooksController extends Zend_Controller_Action {
    
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
     * Список книг
     */
    public function indexAction() {
    
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Создаем модель книг
        $modelbooks = $Books->selectBooks();
        // Передаем модель книг в скрипт вида
        $this->view->books = $modelbooks;
        
    }
    
    /**
     * Добавление книги
     */
    public function addAction() {
        
        // Инициализируем форму добавления книги
        $AddBook = new Forms_AddBook();
        
        // Инициализируем объект отвечающий за работу с категориями
        $Categories = new Categories();
        
        // Создаем модель категорий
        $modelcategories = $Categories->selectCategories();
        
        $AddBook->init($modelcategories);
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
            
            // Проверяем на валидность поля формы
            if($AddBook->isValid($this->_getAllParams())) {
                
                // Инициализируем объект отвечающий за работу с книгами
                $Books = new Books();
            
                // Формируем масив для вставки в базу данных
                $data = array(
                    'title'            => $AddBook->getValue('title'),
                    'author'           => $AddBook->getValue('author'),
                    'categoryid'       => $AddBook->getValue('categoryid'),
                    'count'            => (int)$AddBook->getValue('count'),
                    'publication'      => $AddBook->getValue('publication'),
                    'placepublication' => $AddBook->getValue('placepublication'),
                    'yearpublication'  => $AddBook->getValue('yearpublication'),
                    'countpages'       => (int)$AddBook->getValue('countpages'),
                    'price'            => (float)$AddBook->getValue('price'),
                    'isbn'             => $AddBook->getValue('isbn'),
                    'datecome'         => $AddBook->getValue('datecome'),
                    'img'              => $AddBook->getValue('img'),
                    'shortstory'       => $AddBook->getValue('shortstory'),
                    'fullstory'        => $AddBook->getValue('fullstory'),
                );
                
                // Вставляем данные в базу данных
                $Books->insertBook($data);
    
                // Задаем сообщение
                $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Книга добавлена');
                // Задаем тип сообщения
                $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                // Перенаправление
                $this->_helper->redirector->gotoRoute(array(), 'books');
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->addBook = $AddBook;
        
    }
    
    /**
     * Редоктирование книги
     */
    public function updateAction() {
        
        // Инициализируем объект отвечающий за работу с книгиами
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
            $this->_helper->redirector->gotoRoute(array(), 'books');
        }
        
        // Создаем модель книги
        $modelbook = $Books->selectBooks($id);
        
        // Инициализируем форму
        $UpdateBook = new Forms_UpdateBook();
        
        // Инициализируем объект отвечающий за работу с категориями
        $Categories = new Categories();
        
        // Создаем модель категорий
        $modelcategories = $Categories->selectCategories();
        
        // Передача модели
        $UpdateBook->init($modelbook, $modelcategories);
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if ($this->_request->isPost()) {
            
            // Проверяем на валидность поля формы
            if ($UpdateBook->isValid($this->_getAllParams())) {
                
                // Формируем масив для вставки в базу данных
                $data = array(
                    'title'            => $UpdateBook->getValue('title'),
                    'author'           => $UpdateBook->getValue('author'),
                    'categoryid'       => $UpdateBook->getValue('categoryid'),
                    'count'            => (int)$AddBook->getValue('count'),
                    'publication'      => $AddBook->getValue('publication'),
                    'placepublication' => $AddBook->getValue('placepublication'),
                    'yearpublication'  => $AddBook->getValue('yearpublication'),
                    'countpages'       => (int)$AddBook->getValue('countpages'),
                    'price'            => (float)$AddBook->getValue('price'),
                    'isbn'             => $UpdateBook->getValue('isbn'),
                    'datecome'         => $UpdateBook->getValue('datecome'),
                    'img'              => $UpdateBook->getValue('img'),
                    'shortstory'       => $UpdateBook->getValue('shortstory'),
                    'fullstory'        => $UpdateBook->getValue('fullstory'),
                );
                
                // Вставляем данные в базу данных
                $Books->updateBook($modelbook['id'], $data);
    
                // Задаем сообщение о успешной регистрации
                $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Книга обновлена');
                // Задаем тип сообщения
                $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                // Перенаправление на главную страницу
                $this->_helper->redirector->gotoRoute(array(), 'books');
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->updateBook = $UpdateBook;
    
    }
    
    /**
     * Удаление книги
     */
    public function deleteAction() {
        
        // Инициализируем объект отвечающий за работу с книгиами
        $Books = new Books();
        
        // Получение параметра - id книги
        $id = $this->_getParam('Id');
        
        // Проверка id
        if($Books->existsIdBook($id)) {
            // Удаление категории
            $Books->deleteBook($id);
            
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Книга удалена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
        }
        else {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Книга не найдена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
        }
        // Перенаправление
        $this->_helper->redirector->gotoRoute(array(), 'books');
    }
    
    /**
     * Bывод книги
     */
    public function infoAction() {
    
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
            $this->_helper->redirector->gotoRoute(array(), 'books');
        }
        
        // Создаем модель книги
        $modelbook = $Books->selectBooksFull($id);
        
        // Передаем модель книг в скрипт вида
        $this->view->book = $modelbook;
        
    }
    
}
