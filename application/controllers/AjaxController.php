<?php

/**
 * AjaxController
 * 
 * Работа с ajax
 * 
 */

class AjaxController extends Zend_Controller_Action {

    /**
     * Инициализируем класс
     */
    public function init() {
        // Отключаем авторендеринг шаблонов
        $this->_helper->viewRenderer->setNoRender();
        // Отключаем шаблоны
        $this->_helper->layout()->disableLayout();
    }    
    /**
     * Работа с закладками
     */
    function bookmarkAction() {        
        // Получаем переменую id
        $id = $_REQUEST['id'];
        
        // Инициализируем объект отвечающий за работу с закладками
        $Bookmarks = new Bookmarks();
        
        // Добавляем или удолям с закладок
        $Bookmarks->orAddDel($id);
        
    }
    
    /**
     * Работа с выдачей книг
     */
    function tbookAction() {        
        // Получаем переменые
        $readerid = $_REQUEST['readerid'];
        $bookid   = $_REQUEST['bookid'];
        $count    = intval($_REQUEST['count']);
        
        // Инициализируем объект отвечающий за работу c выдачей и сдачей книг
        $TRBooks = new TRBooks();
        
        // Добавляем запись о выдаче книг
        $TRBooks->insertTRBook($readerid, $bookid, $count);
        
    }
    
    /**
     * Работа с приемом книг
     */
    function rbookAction() {        
        // Получаем переменые
        $readerid = $_REQUEST['readerid'];
        $bookid   = $_REQUEST['bookid'];
        $count    = intval($_REQUEST['count']);
        
        // Инициализируем объект отвечающий за работу c выдачей и сдачей книг
        $TRBooks = new TRBooks();
        
        // Удоляем запись о выдаче книг
        $TRBooks->deleteTRBook($readerid, $bookid, $count);
        
    }
}
