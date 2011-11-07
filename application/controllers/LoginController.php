<?php

/**
 * LoginController
 * 
 * Работа с входом и выходом системы
 * 
 */

class LoginController extends Zend_Controller_Action {
    
    /**
     * Входа в систему
     */
    public function indexAction() {

        // Инициализируем форму входа
        $Login = new Forms_Login();
        
        // Проверяем типа запроса, если POST значит пришли данные формы
        if($this->_request->isPost()) {
        
            // Проверяем на валидность поля формы
            if($Login->isValid($this->_request->getPost())) {
                
                // Инициализируем объект отвечающий за работу с читателями
                $Readers = new Readers();
                
                // Проверяем email и password
                if($Readers->login($Login->getValue('email'), $Login->getValue('password'))) {
                
                    // Задаем сообщение
                    $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Вы вошли в систему');
                    // Задаем тип сообщения
                    $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
                    // Перенаправление
                    $this->_helper->redirector->gotoRoute(array(), 'default');
                }
                else {
                    // Задаем сообщение
                    $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Вы не правельно ввели email либо пароль');
                    // Задаем тип сообщения
                    $this->_helper->FlashMessenger->setNamespace('type')->addMessage('0');
                    // Перенаправление
                    $this->_helper->redirector->gotoRoute(array(), 'login');
                }
                
            }
        }
        // Передаем форму входа в скрипт вида
        $this->view->login = $Login;
    }
    
    /**
     * Выход из системы
     */    
    public function logoutAction() {

        $auth = Zend_Auth::getInstance();
        // Удалить из сессии информацию
        $auth->clearIdentity();
        // Забыть меня
        Zend_Session::forgetMe();
        // Задаем сообщение
        $this->_helper->FlashMessenger->setNamespace('messages')->addMessage('Вы вышли из систем');
        // Задаем тип сообщения
        $this->_helper->FlashMessenger->setNamespace('type')->addMessage('1');
        // Перенаправление
        $this->_helper->redirector->gotoRoute(array(), 'default');
    }

}
