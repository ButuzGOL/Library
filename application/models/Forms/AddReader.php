<?php

/**
 * Forms_AddReader
 * 
 * Форма добавления читателя
 * 
 */
 
class Forms_AddReader extends Forms_Form {
    
    /**
     * Создание формы
     */
    public function init() {
        
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'readers/add'));
        
        // Указываем метод формы
        $this->setMethod('post');
        
        // Text элемент "Фамилия". Проверяется на алфавитные символы и цифры, а также на длину
        // Валидатор Alnum использует установленную локаль для определения алфавита символов.
        $sername = new Zend_Form_Element_Text('sername', array(
            'required'    => true,
            'label'       => 'Фамилия *',
            'maxlength'   => '30',
            'validators'  => array(
                array('Alnum', true, array(true)),
             ),
        ));

        // Добавление элемента
        $this->addElement($sername);
        
        // Text элемент "Имя"
        $name = new Zend_Form_Element_Text('name', array(
            'required'    => false,
            'label'       => 'Имя',
            'maxlength'   => '30',
            'validators'  => array(
                array('Alnum', true, array(true)),
             ),
        ));

        // Добавление элемента
        $this->addElement($name);
        
        // Элемент "Дата рождения"
        $datebirth = new Zend_Form_Element_Text('datebirth', array(
            'required'    => true,
            'label'       => 'Дата рождения *',
            'maxlength'   => '10',
            'readonly'    => 'readonly',
            'validators'  => array(array('Date', true, array('dd.MM.yyyy'))),
            'filters'     => array('StringTrim'),
        ));
        
        // Добавление элемента        $this->addElement($datebirth);
        
        // Text элемент "Адрес"
        $address = new Zend_Form_Element_Text('address', array(
            'required'    => false,
            'label'       => 'Адрес',
            'maxlength'   => '60',
        ));

        // Добавление элемента
        $this->addElement($address); 
        
        // Text элемент "Контактный телефон"
        $contphone = new Zend_Form_Element_Text('contphone', array(
            'required'    => false,
            'label'       => 'Контактный телефон',
            'maxlength'   => '20',
        ));

        // Добавление элемента
        $this->addElement($contphone);
        
        // Radio элемент "Пол"
        $sex = new Zend_Form_Element_Radio('sex', array(
            'required'    => true,
            'label'       => 'Пол',
            'value'       => 'm',
            'multiOptions'=> array('m' => ' Муж', 'f' => ' Жен'),
            'validators'  => array(array('InArray', true, array(array('m', 'f'), true))),
        ));
                
        // Добавление элемента
        $this->addElement($sex);
        
        // Задаем разделитель пробел, для того что бы радио кнопки располагались в ряд
        $sex->setSeparator('&nbsp;');
        
        // Text элемент "Email"
        $email = new Zend_Form_Element_Text('email', array(
            'required'    => true,
            'label'       => 'Email *',
            'maxlength'   => '45',
            'validators'  => array(
                array('emailAddress', true),                array('NoDbRecordExists', true, array('Readers', 'email')),
             ),
             'filters'    => array('StringTrim'),
        ));
        
        // Добавление элемента
        $this->addElement($email);
        
        // Password элемент "Пароль"
        $password = new Zend_Form_Element_Text('password', array(
            'required'    => true,
            'label'       => 'Пароль *',
            'maxlength'   => '30',
            
            'validators'  => array('Password'),
        ));
        
        // Добавление элемента
        $this->addElement($password);
        
        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Добавить',
        ));
        
        // Добавление элемента
        $this->addElement($submit);
        
    }
}
