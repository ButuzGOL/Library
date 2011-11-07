<?php

/**
 * Forms_Tbooks
 * 
 * Форма выдачи книг
 * 
 */
 
class Forms_TBooks extends Forms_Form {
    
    /**
     * Создание формы
     */
    public function init($modelreaders = null) {
        
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'tbooks'));
        
        // Указываем метод формы
        $this->setMethod('post');
        
        // Select элемент "Читатели"
        $readerid = new Zend_Form_Element_Select('readerid', array(
            'required'    => true,
            'label'       => 'Читатель *',
            'filters'     => array('Int'),
        ));
        
        // Добавляем элементы в readerid
        if (count($modelreaders) > 0)
            foreach ($modelreaders as $reader)
                $readerid->addMultiOption($reader->id, $reader->sername . ' ' . $reader->name);

        // Добавление элемента
        $this->addElement($readerid);
        
        // Select элемент "Какие книги"
        $wbooks = new Zend_Form_Element_Select('wbooks', array(
            'required'    => true,
            'multiOptions'=> array('0' => 'Все книги', '1' => 'Закладки читателя'),
        ));

        // Добавление элемента
        $this->addElement($wbooks);
        
        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Выдать список',
        ));
        
        // Добавление элемента
        $this->addElement($submit);
        
    }
}
