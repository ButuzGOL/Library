<div class="middle0">
    <h1>Список книг <a href="<?php echo $this->url(array(), 'books/add'); ?>"><img src="<?php echo $this->img . '/add.png'; ?>" alt="Добавить" title="Добавить" /></a></h1>
    <div class="head" style="font-weight:bold">
        <p class="act">Действия</p>
        <p class="oth">Кол-во</p>
        <p class="oth">Издательство</p>
        <p class="oth">Автор</p>
        <p class="name">Название</p>
    </div>
    <div class="middle">
        <?php if(count($this->books) > 0): ?>
            <?php foreach ($this->books as $book): ?>
                <p class="act">
                    <a href="<?php echo $this->url(array('Id' => $book->id), 'books/info'); ?>"><img src="<?php echo $this->img . '/info.png'; ?>" alt="Просмотреть" title="Просмотреть" /></a>
                    <a href="<?php echo $this->url(array('Id' => $book->id), 'books/update'); ?>"><img src="<?php echo $this->img . '/update.png'; ?>" alt="Изменить" title="Изменить" /></a>
                    <a href="<?php echo $this->url(array('Id' => $book->id), 'books/delete'); ?>"><img src="<?php echo $this->img . '/delete.png'; ?>" alt="Удалить" title="Удалить" /></a>
                </p>
                <p class="oth"><?php echo $book->count; ?></p>
                <p class="oth"><?php echo $book->publication; ?></p>
                <p class="oth"><?php echo $book->author; ?></p>
                <p class="name"><?php echo $book->title; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="nothing">Не найдено</div>
        <?php endif ?>
    </div>
    <div class="foot">&nbsp;</div>
</div>

