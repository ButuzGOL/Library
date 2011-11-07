<?php

/**
 * TRBooksController
 * 
 * Работа с выдачей и приемом книг
 * 
 */

class TRBooksController extends Zend_Controller_Action {
    
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
     * Форма выдачи книг
     */
    public function tbooksAction() {
    
        // Инициализируем форму выдачи книг
        $TBooks = new Forms_TBooks();
        
        // Инициализируем объект отвечающий за работу с читателями
        $Readers = new Readers();
        
        // Создаем модель категорий
        $modelreaders = $Readers->selectReaders();
        
        $TBooks->init($modelreaders);
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
            // Проверяем на валидность поля формы
            if($TBooks->isValid($this->_getAllParams())) {
                
                // Получаем переданные параметры 
                $readerid = $TBooks->getValue('readerid');
                $wbooks   = $TBooks->getValue('wbooks');
                
                // Инициализируем объект отвечающий за работу с книгами
                $Books = new Books();
                
                // Создаем модель книг
                $modelbooks = $Books->selectBooksFull(null, null, null, $wbooks, $readerid);
                
                // Передаем модель книг в скрипт вида
                $this->view->books = $modelbooks;
                
                // Передаем пользователя в скрипт вида
                $this->view->readerid = $readerid;
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->tBooks = $TBooks;
    }
    
    /**
     * Форма приема книг
     */
    public function rbooksAction() {
    
        // Инициализируем форму приема книг
        $RBooks = new Forms_RBooks();
        
        // Инициализируем объект отвечающий за работу с читателями
        $Readers = new Readers();
        
        // Создаем модель категорий
        $modelreaders = $Readers->selectReaders();
        
        $RBooks->init($modelreaders);
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
            // Проверяем на валидность поля формы
            if($RBooks->isValid($this->_getAllParams())) {
                
                // Получаем переданные параметры 
                $readerid = $RBooks->getValue('readerid');
                
                // Инициализируем объект отвечающий за прием и выдачю книг
                $TRBooks = new TRBooks();
                
                // Получаем модуль взятых книг
                $modelbooks = $TRBooks->selectTRBooks($readerid);
                
                // Передаем модель книг в скрипт вида
                $this->view->books = $modelbooks;
                
                // Передаем пользователя в скрипт вида
                $this->view->readerid = $readerid;
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->rBooks = $RBooks;
    }
    
}
