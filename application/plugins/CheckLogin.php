<?php

/**
 * CheckLogin
 * 
 * Плагин для обновления данных в сессии
 * 
 */
class CheckLogin extends Zend_Controller_Plugin_Abstract {

    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request) {
        
        $auth = Zend_Auth::getInstance();
        // Идентефицируем пользователя
        $reader = $auth->getIdentity();
        
        // Проверяем идентифицировался пользователь
        if($reader->id) {
            // Инициализируем объект отвечающий за работу с читателями
            $Readers = new Readers();
            // Перезаписываем данные в сессию
            $auth->getStorage()->write($Readers->getReaderByIdS($reader->id));
        }
    }

}
