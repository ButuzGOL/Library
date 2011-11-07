<?php

/**
 * Forms_UpdateBook
 * 
 * Форма редоктирования книги
 * 
 */
 
class Forms_UpdateBook extends Forms_Form {
    
    /**
     * Создание формы
     */
    
    public function init($modelbook = null, $modelcategories = null) {
        
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'books/update'));
        
        // Указываем метод формы
        $this->setMethod('post');
        
        // Указываем атрибуты формы
        $this->setAttrib('enctype', 'multipart/form-data');
        
        // Text элемент "Титул". Проверяется на алфавитные символы и цифры, а также на длину
        // Валидатор Alnum использует установленную локаль для определения алфавита символов.
        $title = new Zend_Form_Element_Text('title', array(
            'required'    => true,
            'value'       => $modelbook['title'],
            'label'       => 'Титул *',
            'maxlength'   => '45',
            'validators'  => array(
                array('Alnum', true, array(true)),             ),
        ));

        // Добавление элемента
        $this->addElement($title);
        
        // Text элемент "Автор"
        $author = new Zend_Form_Element_Text('author', array(
            'required'    => true,
            'value'       => $modelbook['author'],
            'label'       => 'Автор *',
            'maxlength'   => '50',
        ));

        // Добавление элемента
        $this->addElement($author);
        
        // Multiselect элемент "Категории книг"
        $categoryid = new Zend_Form_Element_Multiselect('categoryid', array(
            'required'    => false,
            'label'       => 'Категории книг',
            'filters'     => array('Int'),
            'value'       => @explode(',', $modelbook['categoryid']),
        ));
        
        // Добавляем элементы в categoryid
        $categoryid->addMultiOption('0', '');
        if (count($modelcategories) > 0)
            foreach ($modelcategories as $category)
                $categoryid->addMultiOption($category->id, $category->name);
        
        // Добавление элемента
        $this->addElement($categoryid);

        // Text элемент "Кол-во"
        $count = new Zend_Form_Element_Text('count', array(
            'required'    => true,
            'value'       => $modelbook['count'],
            'label'       => 'Кол-во *',
            'maxlength'   => '5',
            'validators'  => array(
                array('Int'),
             ),
        ));

        // Добавление элемента
        $this->addElement($count);
        
        // Text элемент "Издательство"
        $publication = new Zend_Form_Element_Text('publication', array(
            'required'    => true,
            'value'       => $modelbook['publication'],
            'label'       => 'Издательство *',
            'maxlength'   => '45',
        ));

        // Добавление элемента
        $this->addElement($publication);
        
        // Text элемент "Место издания"
        $placepublication = new Zend_Form_Element_Text('placepublication', array(
            'required'    => false,
            'value'       => $modelbook['placepublication'],
            'label'       => 'Место издания',
            'maxlength'   => '45',
        ));

        // Добавление элемента
        $this->addElement($placepublication);
        
        // Text элемент "Год издания"
        $yearpublication = new Zend_Form_Element_Text('yearpublication', array(
            'required'    => false,
            'value'       => $modelbook['yearpublication'],
            'label'       => 'Год издания',
            'maxlength'   => '4',
            'validators'  => array(
                array('Int'),
             ),
        ));

        // Добавление элемента
        $this->addElement($yearpublication);
        
        // Text элемент "Кол-во страниц"
        $countpages = new Zend_Form_Element_Text('countpages', array(
            'required'    => false,
            'value'       => $modelbook['countpages'],
            'label'       => 'Кол-во страниц',
            'maxlength'   => '6',
            'validators'  => array(
                array('Alnum', true, array(true)),
                array('Int'),
             ),
        ));

        // Добавление элемента
        $this->addElement($countpages);
        
        // Text элемент "Цена"
        $price = new Zend_Form_Element_Text('price', array(
            'required'    => false,
            'value'       => $modelbook['price'],
            'label'       => 'Цена',
            'maxlength'   => '10',
            'validators'  => array(
                array('Float'),
             ),
        ));

        // Добавление элемента
        $this->addElement($price);
        
        // Text элемент "ISBN"
        $isbn = new Zend_Form_Element_Text('isbn', array(
            'required'    => true,
            'value'       => $modelbook['isbn'],
            'label'       => 'ISBN *',
            'maxlength'   => '17',
            'validators'  => array(
             ),
        ));

        // Добавление элемента
        $this->addElement($isbn);
        
        // Преобразовуем дату в строку dd.MM.yyyy
        $datecome = $modelbook['datecome'];
        if($datecome) {
            $temp = getdate($datecome);

            $datecome = (strlen($temp['mday']) == 2) ? $temp['mday'] . '.' : '0' . $temp['mday'] . '.';
            $datecome .= (strlen($temp['mon']) == 2) ? ($temp['mon']) . '.' . $temp['year'] : '0' . ($temp['mon']) . '.' . $temp['year'];
        }
        
        // Text элемент "Дата поступления"
        $datecome = new Zend_Form_Element_Text('datecome', array(
            'required'    => false,
            'value'       => $datecome,
            'label'       => 'Дата поступления',
            'maxlength'   => '10',
            'readonly'    => 'readonly',
            'validators'  => array(array('Date', true, array('dd.MM.yyyy'))),
            'filters'     => array('StringTrim'),
            'onChange'    => 'if (tt.checked==true) tt.checked = false;'
        ));
        
        // Добавление элемента        $this->addElement($datecome);
        
        // Checkbox Элемент "текущая дата"
        $datecomett = new Zend_Form_Element_Checkbox('datecomett', array(
            'required'    => false,
            'label'       => 'текущая дата',
            'id'          => 'tt',
            'onChange'    => 'if (tt.checked == true) datecome.value="";'
        ));
        
        // Добавление элемента        $this->addElement($datecomett);
        
        // File элемент "Картинка книги"
        $img = new Zend_Form_Element_File('img', array(
            'required'       => false,
            'label'          => 'Картинка книги',
            'validators'     => array(
                array('Extension', false, 'jpg,png,gif,jpeg'),
                array('Count', false, 1),
                array('Size', false, 1024000),
             ),
            
        ));
        $img->setDestination(BASE_DIR . 'uploads');
        
        // Добавление элемента        $this->addElement($img);
        
        // Textarea элемент "Про книгу вкратце"
        $shortstory = new Zend_Form_Element_Textarea('shortstory', array(
            'required'    => true,
            'value'       => $modelbook['shortstory'],
            'label'       => 'Про книгу вкратце *',
            'filters'     => array('StringTrim'),
        ));
        
        // Добавление элемента        $this->addElement($shortstory);
        
        // Textarea элемент "Про книгу целиком"
        $fullstory = new Zend_Form_Element_Textarea('fullstory', array(
            'required'    => false,
            'value'       => $modelbook['fullstory'],
            'label'       => 'Про книгу целиком',
            'filters'     => array('StringTrim'),
        ));
                
        // Добавление элемента        $this->addElement($fullstory);
        
        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label'       => 'Отредоктировать',
        ));
        
        // Добавление элемента
        $this->addElement($submit);
        
    }
    
}
