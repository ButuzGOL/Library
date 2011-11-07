<?php

/**
 * Файл формирования маршрутов. Происходит инициализация объекта маршрутизации и задание правил маршрутизации
 * 
 */

$router = new Zend_Controller_Router_Rewrite();

$router->addRoute('categories',
     new Zend_Controller_Router_Route('categories', array('controller' => 'categories', 'action' => 'index'))
);

$router->addRoute('categories/add',
     new Zend_Controller_Router_Route('categories/add', array('controller' => 'categories', 'action' => 'add'))
);

$router->addRoute('categories/update',
     new Zend_Controller_Router_Route('categories/update/:Id', array('controller' => 'categories', 'action' => 'update'))
);

$router->addRoute('categories/delete',
     new Zend_Controller_Router_Route('categories/delete/:Id', array('controller' => 'categories', 'action' => 'delete'))
);

$router->addRoute('readers',
     new Zend_Controller_Router_Route('readers', array('controller' => 'readers', 'action' => 'index'))
);

$router->addRoute('readers/add',
     new Zend_Controller_Router_Route('readers/add', array('controller' => 'readers', 'action' => 'add'))
);

$router->addRoute('readers/update',
     new Zend_Controller_Router_Route('readers/update/:Id', array('controller' => 'readers', 'action' => 'update'))
);

$router->addRoute('readers/delete',
     new Zend_Controller_Router_Route('readers/delete/:Id', array('controller' => 'readers', 'action' => 'delete'))
);

$router->addRoute('login',
     new Zend_Controller_Router_Route('login', array('controller' => 'login', 'action' => ''))
);

$router->addRoute('logout',
     new Zend_Controller_Router_Route('logout', array('controller' => 'login', 'action' => 'logout'))
);

$router->addRoute('books',
     new Zend_Controller_Router_Route('books', array('controller' => 'books', 'action' => 'index'))
);

$router->addRoute('books/add',
     new Zend_Controller_Router_Route('books/add', array('controller' => 'books', 'action' => 'add'))
);

$router->addRoute('books/update',
     new Zend_Controller_Router_Route('books/update/:Id', array('controller' => 'books', 'action' => 'update'))
);

$router->addRoute('books/delete',
     new Zend_Controller_Router_Route('books/delete/:Id', array('controller' => 'books', 'action' => 'delete'))
);

$router->addRoute('books/info',
     new Zend_Controller_Router_Route('books/info/:Id', array('controller' => 'books', 'action' => 'info'))
);

$router->addRoute('book',
     new Zend_Controller_Router_Route('book/:Id', array('controller' => 'index', 'action' => 'binfo'))
);

$router->addRoute('page',
     new Zend_Controller_Router_Route('page/:pageId', array('controller' => 'index', 'action' => 'index'))
);

$router->addRoute('category',
     new Zend_Controller_Router_Route('category/:Id', array('controller' => 'index', 'action' => 'category'))
);

$router->addRoute('bookmarks',
     new Zend_Controller_Router_Route('bookmarks', array('controller' => 'bookmarks', 'action' => 'index'))
);

$router->addRoute('tbooks',
     new Zend_Controller_Router_Route('tbooks', array('controller' => 'trbooks', 'action' => 'tbooks'))
);

$router->addRoute('rbooks',
     new Zend_Controller_Router_Route('rbooks', array('controller' => 'trbooks', 'action' => 'rbooks'))
);

$router->addRoute('readers/info',
     new Zend_Controller_Router_Route('readers/info/:Id', array('controller' => 'readers', 'action' => 'info'))
);

$router->addRoute('reader',
     new Zend_Controller_Router_Route('reader/:Id', array('controller' => 'index', 'action' => 'rinfo'))
);

