<?php

/**
 * Forms_Login
 * 
 * Форма регистрации
 * 
 */
 
class Forms_Login extends Forms_Form {
  
    public function init() {
    
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'login'));
        
        // Указываем метод формы
        $this->setMethod('post');
        
        // Text элемент "Имя". Проверяется на алфавитные символы и цифры, а также на длину
        // Валидатор Alnum использует установленную локаль для определения алфавита символов.
        $email = new Zend_Form_Element_Text('email', array(
            'required'    => true,
            'label'       => 'Email:',
            'maxlength'   => '45',
            'validators'  => array(
                array('emailAddress', true),
             ),
             'filters'     => array('StringTrim'),
        ));
        
        // Добавление элемента
        $this->addElement($email); 
        
        // Text элемент "Имя". Проверяется на алфавитные символы и цифры, а также на длину
        // Валидатор Alnum использует установленную локаль для определения алфавита символов.
        $password = new Zend_Form_Element_Password('password', array(
            'required'    => true,
            'label'       => 'Пароль:',
            'maxlength'   => '30',
            'validators'  => array(
                array('Alnum', true, array(true)),             ),
        ));
        
        // Добавление элемента
        $this->addElement($password); 

        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label'       => 'Войти',
        ));
        
        // Добавление элемента
        $this->addElement($submit);

  }
}
