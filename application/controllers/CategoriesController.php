<?php

/**
 * CategoriesController
 * 
 * Работа с категориями
 * 
 */

class CategoriesController extends Zend_Controller_Action {
    
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
     * Список категорий
     */
    public function indexAction() {
    
        // Инициализируем объект отвечающий за работу с категориями
        $Categories = new Categories();
        
        // Создаем модель категорий
        $modelcategories = $Categories->selectCategories();
        // Передаем модель категорий в скрипт вида
        $this->view->categories = $modelcategories;
        
    }
    
    /**
     * Добавление категории
     */
    public function addAction() {
        
        // Инициализируем форму добавления категории
        $AddCategory = new Forms_AddCategory();
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
            
            // Проверяем на валидность поля формы
            if($AddCategory->isValid($this->_getAllParams())) {
                
                // Инициализируем объект отвечающий за работу с категориями
                $Categories = new Categories();
                
                // Формируем масив для вставки в базу данных
                $data = array(
                    'name' => $AddCategory->getValue('name'),
                );
                
                // Вставляем данные в базу данных
                $Categories->insertCategory($data);
    
                // Задаем сообщение
                $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Категория добавлена');
                // Задаем тип сообщения
                $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                // Перенаправление
                $this->_helper->redirector->gotoRoute(array(), 'categories');
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->addCategory = $AddCategory;
        
    }
    
    /**
     * Редоктирование категории
     */
    public function updateAction() {
        
        // Инициализируем объект отвечающий за работу с категориями
        $Categories = new Categories();
        
        // Получение параметра - id категории
        $id = $this->_getParam('Id');
       
        // Проверка id
        if(!$Categories->existsIdCategory($id)) {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Категория не найдена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
            // Перенаправление
            $this->_helper->redirector->gotoRoute(array(), 'categories');
        }
        
        // Создаем модель категории
        $modelcategory = $Categories->selectCategories($id);
        
        // Инициализируем форму
        $UpdateCategory = new Forms_UpdateCategory();
        // Передача модели
        $UpdateCategory->init($modelcategory);
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if ($this->_request->isPost()) {
            
            // Проверяем на валидность поля формы
            if ($UpdateCategory->isValid($this->_getAllParams())) {
                
                // Формируем масив для вставки в базу данных
                $data = array(
                    'name' => $UpdateCategory->getValue('name'),
                );
                
                // Вставляем данные в базу данных
                $Categories->updateCategory($modelcategory['id'], $data);
    
                // Задаем сообщение о успешной регистрации
                $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Категория обновлена');
                // Задаем тип сообщения
                $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                // Перенаправление на главную страницу
                $this->_helper->redirector->gotoRoute(array(), 'categories');
                
            }
        }
        
        // Передаем форму в скрипт вида
        $this->view->updateCategory = $UpdateCategory;
    
    }
    
    /**
     * Удаление категории
     */
    public function deleteAction() {
    
        $Categories = new Categories();
        
        // Получение параметра - id категории
        $id = $this->_getParam('Id');
        
        // Проверка id
        if($Categories->existsIdCategory($id)) {
            // Удаление категории
            $Categories->deleteCategory($id);
            
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Категория удалена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
        }
        else {
            // Задаем сообщение
            $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Категория не найдена');
            // Задаем тип сообщения
            $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
        }
        // Перенаправление
        $this->_helper->redirector->gotoRoute(array(), 'categories');
    }
    
}
