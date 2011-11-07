<?php 

/**
 * Файл с переводами сообщений об ошибках
 * 
 */

return $errors = array (

    Zend_Validate_Alnum::NOT_ALNUM => "Значение содержит запрещенные символы. Разрешены символы латиници, кирилици, цифры и пробел",
     
    Zend_Validate_NotEmpty::IS_EMPTY => 'Поле не может быть пустым',
     
    Zend_Validate_StringLength::TOO_LONG  => 'Длина введённого значения больше чем %max% символов',
    
    Forms_Validate_NoDbRecordExists::RECORD_EXISTS => 'Такое значение уже присутствует в базе данных',
    
    Forms_Validate_Password::INVALID        => 'Не верный формат пароля',
    Forms_Validate_Password::INVALID_LENGTH => 'Длина пароля должна быть от 7 до 30 - ти символов',
    
    Zend_Validate_Alnum::NOT_ALNUM     => "Значение содержит запрещенные символы. Разрешены символы латиници, кирилици, цифры и пробел",
    Zend_Validate_Alnum::STRING_EMPTY  => "Поле не может быть пустым",
    
    Zend_Validate_Date::NOT_YYYY_MM_DD => 'Значение не соответствует формату год-месяц-день',   
    Zend_Validate_Date::INVALID        => 'Неверная дата',   
    Zend_Validate_Date::FALSEFORMAT    => 'Значение не соответствует указанному формату',   
     
    Zend_Validate_EmailAddress::INVALID            => "Не верный формат адреса электронной почты. Введите почту в формате local-part@hostname",
    Zend_Validate_EmailAddress::INVALID_HOSTNAME   => "'%hostname%' не верный домен для адреса электронной почты '%value%'",
    Zend_Validate_EmailAddress::INVALID_MX_RECORD  => "'%hostname%' не имеет MX-записи об адресе электронной почты '%value%'",
    Zend_Validate_EmailAddress::DOT_ATOM           => "'%localPart%' не соответствует формату dot-atom",
    Zend_Validate_EmailAddress::QUOTED_STRING      => "'%localPart%' не соответствует формату quoted-string",
    Zend_Validate_EmailAddress::INVALID_LOCAL_PART => "'%localPart%' не верное имя для адреса электронной почты '%value%'",

    Zend_Validate_Int::NOT_INT => 'Значение не является целочисленным значением',
    
    Zend_Validate_Float::NOT_FLOAT => 'Значение не является правельным',
    
    Zend_Validate_NotEmpty::IS_EMPTY => 'Поле не может быть пустым',
     
    Zend_Validate_StringLength::TOO_SHORT => 'Длина введённого значения меньше чем %min% символов',   
    Zend_Validate_StringLength::TOO_LONG  => 'Длина введённого значения больше чем %max% символов',
    
    Zend_Validate_File_Upload::INI_SIZE => "Файл '%value%' превышает допустимый размер",  
    Zend_Validate_File_Upload::FORM_SIZE => "Файл '%value%' превышает допустимый размер",  
    Zend_Validate_File_Upload::PARTIAL => "Файл '%value%' был загружен частично",  
    Zend_Validate_File_Upload::NO_FILE => "Файл '%value%' не был загружен",  
    Zend_Validate_File_Upload::NO_TMP_DIR => "Не было найдено временной директории для файла '%value%'",  
    Zend_Validate_File_Upload::CANT_WRITE => "Файл '%value%' не может быть записан",  
    Zend_Validate_File_Upload::EXTENSION => "Недопустимо загружать файлы с таким расширением",  
    Zend_Validate_File_Upload::ATTACK => "Файл '%value%' загружен некорректно, включен механизм защиты от атак",  
    Zend_Validate_File_Upload::FILE_NOT_FOUND => "Файл '%value%' не был найден",  
    Zend_Validate_File_Upload::UNKNOWN => "Возникла неизвестная ошибка при загрузке файла '%value%'",  
    Zend_Validate_File_Size::TOO_BIG => "Файл '%value%' имеет слишком большой размер",  
    Zend_Validate_File_Size::TOO_SMALL => "Файл '%value%' слишком маленького размера",  
    Zend_Validate_File_Size::NOT_FOUND => "Файл '%value%' не найден",  
    Zend_Validate_File_ImageSize::WIDTH_TOO_BIG => "Ширина загруженного рисунка '%value%' слишком большая",  
    Zend_Validate_File_ImageSize::WIDTH_TOO_SMALL => "Ширина загруженного рисунка '%value%' слишком маленькая",  
    Zend_Validate_File_ImageSize::HEIGHT_TOO_BIG => "Высота загруженного рисунка '%value%' слишком большая",  
    Zend_Validate_File_ImageSize::HEIGHT_TOO_SMALL => "Высота загруженного рисунка '%value%' слишком маленькая",  
    Zend_Validate_File_ImageSize::NOT_DETECTED => "Размеры загруженного рисунка '%value%' определить невозможно",  
    Zend_Validate_File_ImageSize::NOT_READABLE => "Рисунок '%value%' невозможно считать",  
    Zend_Validate_File_FilesSize::TOO_BIG => "Размеры загруженных файлов в сумме имеют размер больше разрешенного",  
    Zend_Validate_File_FilesSize::TOO_SMALL => "Размеры загруженных файлов в сумме имеют слишком маленький объем",  
    Zend_Validate_File_FilesSize::NOT_READABLE => "Один или несколько файлов неудается считать",  
    Zend_Validate_File_Count::TOO_MUCH => "Слишком много файлов загружено, разрешено только '%value%'",  
    Zend_Validate_File_Count::TOO_LESS => "Слишком мало файлов загружено, минимальное допустимое число файлов '%value%'",  
    Zend_Validate_File_Extension::FALSE_EXTENSION => "Загруженый файл '%value%' имеет неразрешенное расширение",  
    Zend_Validate_File_Extension::NOT_FOUND => "Файл '%value%' не найден"    
 );
