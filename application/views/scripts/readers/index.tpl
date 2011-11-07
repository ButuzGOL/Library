<div class="middle0">
    <h1>Список читателей <a href="<?php echo $this->url(array(), 'readers/add'); ?>"><img src="<?php echo $this->img . '/add.png'; ?>" alt="Добавить" title="Добавить" /></a></h1>
    <div class="head" style="font-weight:bold">
        <p class="act">Действия</p>
        <p class="oth">Контактный телефон</p>
        <p class="oth">Email</p>
        <p class="name">Фамилия Имя</p>
    </div>
    <div class="middle">
        <?php if(count($this->readers) > 0): ?>
            <?php foreach ($this->readers as $reader): ?>
                <p class="act">
                    <a href="<?php echo $this->url(array('Id' => $reader->id), 'readers/info'); ?>"><img src="<?php echo $this->img . '/info.png'; ?>" alt="Просмотреть" title="Просмотреть" /></a>
                    <a href="<?php echo $this->url(array('Id' => $reader->id), 'readers/update'); ?>"><img src="<?php echo $this->img . '/update.png'; ?>" alt="Изменить" title="Изменить" /></a>
                    <a href="<?php echo $this->url(array('Id' => $reader->id), 'readers/delete'); ?>"><img src="<?php echo $this->img . '/delete.png'; ?>" alt="Удалить" title="Удалить" /></a>
                </p>
                <p class="oth">&nbsp;<?php echo $reader->contphone; ?></p>
                <p class="oth"><?php echo $reader->email; ?></p>
                <p class="name"><?php echo $reader->sername . ' ' . $reader->name; ?></p>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="nothing">Не найдено</div>
        <?php endif ?>
    </div>
    <div class="foot">&nbsp;</div>
</div>

