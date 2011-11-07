<?php

/**
 * Forms_Rbooks
 * 
 * Форма приема книг
 * 
 */
 
class Forms_RBooks extends Forms_Form {
    
    /**
     * Создание формы
     */
    public function init($modelreaders = null) {
        
        // Вызываем родительский метод
        parent::init();
        
        // Указываем action формы
        $helperUrl = new Zend_View_Helper_Url();
        $this->setAction($helperUrl->url(array(), 'rbooks'));
        
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
        
        // Кнопка Submit
        $submit = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Выдать список',
        ));
        
        // Добавление элемента
        $this->addElement($submit);
        
    }
}
