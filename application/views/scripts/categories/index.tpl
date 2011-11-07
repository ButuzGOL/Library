<div class="middle0">
    <h1>Список категорий <a href="<?php echo $this->url(array(), 'categories/add'); ?>"><img src="<?php echo $this->img . '/add.png'; ?>" alt="Добавить" title="Добавить" /></a></h1>
    <div class="head" style="font-weight:bold">
        <p class="act">Действия</p>
        <p class="name">Название</p>
    </div>
    <div class="middle">
        <?php if(count($this->categories) > 0): ?>
            <?php foreach ($this->categories as $category): ?>
                <p class="act">
                    <a href="<?php echo $this->url(array('Id' => $category->id), 'categories/update'); ?>"><img src="<?php echo $this->img . '/update.png'; ?>" alt="Изменить" title="Изменить" /></a>
                    <a href="<?php echo $this->url(array('Id' => $category->id), 'categories/delete'); ?>"><img src="<?php echo $this->img . '/delete.png'; ?>" alt="Удалить" title="Удалить" /></a>
                </p>
                <p class="name"><?php echo $category->name; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="nothing">Не найдено</div>
        <?php endif ?>
    </div>
    <div class="foot">&nbsp;</div>
</div>

