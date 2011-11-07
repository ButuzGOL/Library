<?php

/**
 * Forms_UpdateReader
 * 
 * Форма редоктирования читателя
 * 
 */
 
class Forms_UpdateReader extends Forms_Form {
    
    /**
     * Создание формы
     */
    
    public function init($modelreader = null) {
        
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'readers/update'));
        
        // Указываем метод формы
        $this->setMethod('post');
        
        // Text элемент "Фамилия". Проверяется на алфавитные символы и цифры, а также на длину
        // Валидатор Alnum использует установленную локаль для определения алфавита символов.
        $sername = new Zend_Form_Element_Text('sername', array(
            'required'    => true,
            'label'       => 'Фамилия *',
            'value'       => $modelreader['sername'],
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
            'value'       => $modelreader['name'],
            'maxlength'   => '30',
            'validators'  => array(
                array('Alnum', true, array(true)),
             ),
        ));

        // Добавление элемента
        $this->addElement($name);
        
        // Преобразовуем дату в строку dd.MM.yyyy
        $datebirth = $modelreader['datebirth'];
        if($datebirth) {
            $temp = getdate($datebirth);

            $datebirth = (strlen($temp['mday']) == 2) ? $temp['mday'] . '.' : '0' . $temp['mday'] . '.';
            $datebirth .= (strlen($temp['mon']) == 2) ? ($temp['mon']) . '.' . $temp['year'] : '0' . ($temp['mon']) . '.' . $temp['year'];
        }
        
        // Элемент "Дата рождения"
        $datebirth = new Zend_Form_Element_Text('datebirth', array(
            'required'    => true,
            'label'       => 'Дата рождения *',
            'value'       => $datebirth,
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
            'value'       => $modelreader['address'],
            'maxlength'   => '60',
        ));

        // Добавление элемента
        $this->addElement($address); 
        
        // Text элемент "Контактный телефон"
        $contphone = new Zend_Form_Element_Text('contphone', array(
            'required'    => false,
            'label'       => 'Контактный телефон',
            'value'       => $modelreader['contphone'],
            'maxlength'   => '20',
        ));

        // Добавление элемента
        $this->addElement($contphone);
        
        // Radio элемент "Пол"
        $sex = new Zend_Form_Element_Radio('sex', array(
            'required'    => true,
            'label'       => 'Пол',
            'value'       => $modelreader['sex'],
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
            'value'       => $modelreader['email'],
            'maxlength'   => '45',
            'validators'  => array(
                array('emailAddress', true),
                array('NoDbRecordExists', true, array('Readers', 'email', $modelreader['id'])),
             ),
             'filters'    => array('StringTrim'),
        ));
        
        // Добавление элемента
        $this->addElement($email);
        
        // Password элемент "Пароль"
        $password = new Zend_Form_Element_Text('password', array(
            'required'    => false,
            'label'       => 'Пароль *',
            'maxlength'   => '30',
            
            'validators'  => array('Password'),
        ));
        
        // Добавление элемента
        $this->addElement($password);
        
        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label'       => 'Отредоктировать',
        ));
        
        // Добавление элемента
        $this->addElement($submit);
        
    }
    
}
