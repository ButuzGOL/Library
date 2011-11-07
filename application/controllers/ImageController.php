<?php

/**
 * ImageController
 * 
 * Работа с картинкой
 * 
 */

class ImageController extends Zend_Controller_Action {

    function resizeAction() {
    
        // Отключаем авторендеринг шаблонов
        $this->_helper->viewRenderer->setNoRender();
        // Отключаем шаблоны
        $this->_helper->layout()->disableLayout();
        
        // Инициализируем объект отвечающий за работу c картинками
        $Image = new Zend_Image();
        
        // Получаем путь картинки
        $filename = '..' . $_GET['filename'];
        
        // Считываем изображение
        $im   = $Image->readImage($filename);
        // Делаем ресайз изображения
        $new  = $Image->resize($im, $_GET['width'], $_GET['height'], true);
        $type = $Image->filenameToMime($filename);
        // Выводим картинку
        header("Content-type:image/jpeg");
        $Image->writeImage($new, $type);

    }
    
}
