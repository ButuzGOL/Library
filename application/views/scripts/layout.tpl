<?php echo $this->doctype(Zend_View_Helper_Doctype::XHTML1_STRICT); ?>
<html>
<head>
    <?php echo $this->headTitle('Библиотека'); ?>
    <?php echo $this->headMeta()->appendHttpEquiv('Content-Type', 'text/html; charset=UTF-8'); ?>
    <?php echo $this->headLink()->appendStylesheet($this->css . '/style.css'); ?>
    <?php echo $this->headScript()->appendFile($this->js . '/prototype.js'); ?>
    <?php echo $this->headScript()->appendFile($this->js . '/ajax_funcs.js'); ?>
    <?php echo $this->headScript(); ?>
</head>
<body>
    <div id="menu">
        <div class="left">
            <a href="<?php echo $this->url(array(), 'default', true) ?>"><img src="<?php echo $this->img . '/logotip.png'; ?>" alt="Главная" title="Главная" style="float:left;" /></a><h1>Библиотека</h1> 
        </div>
        <div class="right">
		
        <?php if(!$this->auth->id): ?>
            <a href= "<?php echo $this->url(array(), 'login'); ?>"><img src="<?php echo $this->img . '/login.png'; ?>" alt="Авторизироватся" title="Авторизироватся" /></a>
        <?php elseif($this->auth->status == '0'): ?>
            <span style="font-size:10px;">Привет <?php echo $this->auth->name . ' ' . $this->auth->sername; ?></span><br />
            <a href="<?php echo $this->url(array(), 'books'); ?>">Книги</a><br />
            <a href="<?php echo $this->url(array(), 'readers'); ?>">Читатели</a><br />
            <a href="<?php echo $this->url(array(), 'categories'); ?>">Категории</a><br />
            <a href="<?php echo $this->url(array(), 'tbooks'); ?>">Выдача книг</a><br />
            <a href="<?php echo $this->url(array(), 'rbooks'); ?>">Прием книг</a><br />
            <a href="<?php echo $this->url(array('Id' => $this->auth->id), 'reader'); ?>">Про меня</a><br />
            <a href="<?php echo $this->url(array(), 'bookmarks'); ?>">Мои закладки</a><br />
            <a href="<?php echo $this->url(array(), 'logout'); ?>">Завершить сеанс</a><br />
        <?php else: ?>
            <span style="font-size:10px;">Привет <?php echo $this->auth->name . ' ' . $this->auth->sername; ?></span><br />
            <a href="<?php echo $this->url(array('Id' => $this->auth->id), 'reader'); ?>">Про меня</a><br />
            <a href="<?php echo $this->url(array(), 'bookmarks'); ?>">Мои закладки</a><br />
            <a href="<?php echo $this->url(array(), 'logout'); ?>">Завершить сеанс</a><br />
        <?php endif ?>
        </div>
    </div>
    <div id="middle">
        <div id="left">
            <a href="<?php echo $this->url(array(), 'default', true) ?>">Главная</a><br /><br />
            <?php if(count($this->categories) > 0): ?>
                Категории:<br />
                <?php foreach ($this->categories as $category): ?>
                    <a href="<?php echo $this->url(array('Id' => $category->id), 'category'); ?>"><?php echo $category->name; ?></a><br />
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div id="content">
            <?php echo $this->layout()->messages; ?>
            <?php echo $this->layout()->content; ?>
        </div>
    </div>
    <div id="buttom">Copyright by r0n9.GOL © 2009</div>
    
</body>
</html>
