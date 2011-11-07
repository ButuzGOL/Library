<?php

/**
 * Forms_Form
 * 
 * Класс наследник Zend_Form, помогает настроить окружение.
 * Все формы будут наследоваться от этого класса.
 * 
 */
class Forms_Form extends Zend_Form {

    /**
     * Инициализация формы
     *      */
    
    public function init() {
        // Вызов родительского метода
        parent::init();
        
        // Создаем объект переводчика, он нам необходим для перевода сообщений об ошибках.
        // В качестве адаптера используется php массив
        $translator = new Zend_Translate('array', Zend_Registry::get('config')->path->languages . 'error.php');
        
        // Задаем объект переводчика для формы
        $this->setTranslator($translator);
        
        /* Задаем префиксы для самописных элементов, валидаторов, фильтров и декораторов.
           Благодаря этому Zend_Form будет знать где искать наши самописные элементы */
        $this->addElementPrefixPath('Forms_Validate', '/models/Forms/Validate', 'validate');
    }
}
