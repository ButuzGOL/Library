<?php

/**
 * BookmarksController
 * 
 * Работа с закладками
 * 
 */

class BookmarksController extends Zend_Controller_Action {
    
    /**
     * Мои закладки
     */
    public function indexAction() {
    
        // Инициализируем объект отвечающий за работу с книгами
        $Books = new Books();
        
        // Создаем модель книг
        $modelbooks = $Books->selectBooksFull(null, null, null, true);
        
        // Передаем модель книг в скрипт вида
        $this->view->books = $modelbooks;
        
    }

}
