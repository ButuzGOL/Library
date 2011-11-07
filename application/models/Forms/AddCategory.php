<?php

/**
 * Forms_AddCategory
 * 
 * Форма добавления категории
 * 
 */
 
class Forms_AddCategory extends Forms_Form {
    
    /**
     * Создание формы
     */
    public function init() {
        
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'categories/add'));
        
        // Указываем метод формы
        $this->setMethod('post');
        
        // Text элемент "Имя". Проверяется на алфавитные символы и цифры, а также на длину
        // Валидатор Alnum использует установленную локаль для определения алфавита символов.
        $name = new Zend_Form_Element_Text('name', array(
            'required'    => true,
            'label'       => 'Название *',
            'maxlength'   => '30',
            'validators'  => array(
                array('Alnum', true, array(true)),
                array('NoDbRecordExists', true, array('Categories', 'name')),
             ),
        ));

        // Добавление элемента
        $this->addElement($name); 

        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Добавить',
        ));
        
        // Добавление элемента
        $this->addElement($submit);
        
    }
}
