<?php

/**
 * Точка входа
 *
 * Файл на который перенаправляются все запросы к сайту, подключает ядро сайта и запускает приложение
 *
 * Web-site: http://www.pamparam.net/
 * Author: r0n9.GOL email: ron9.gol@gmail.com
 * 
 */

// Подключаем файл настроек
require 'application/settings/config.php';

// Создаем строку путей
$paths = implode(PATH_SEPARATOR, 
    array(
        $config['path']['library'], 
        $config['path']['models']
    ));

// Устанавливаем пути по которым происходит поиск подключаемых файлов, это папка библиотек, моделей и системных файлов
set_include_path($paths);

// Подключение главного системного класса
require 'application/Bootstrap.php';

// Запуск приложения
$bootstrap = new Bootstrap();
$bootstrap->run($config);
