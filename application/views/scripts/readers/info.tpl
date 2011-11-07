<div class="post">
    <a href="<?php echo $this->url(array(), 'readers'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> <span style="font-size:24px; font-weight:bold;"><?php echo $this->reader['sername'] . ' ' . $this->reader['name']; ?></span>
    <div class="text">
        <span class="a">
            <b>Дата рождения:</b> <?php echo $this->reader['datebirth']; ?><br />
            <b>Адрес:</b> <?php echo $this->reader['address']; ?><br />
            <b>Контактный тел.:</b> <?php echo $this->reader['contphone']; ?><br />
            <b>Пол:</b> <?php echo $this->reader['sex']; ?><br />
            <b>Email:</b> <?php echo $this->reader['email']; ?><br />
        </span>
    </div></div>
<span style="font-size:20px; font-weight:bold;">Взятые книг</span>
<div class="middle0">
    <div class="head" style="font-weight:bold">
        <p class="oth" style="width:100px;">Кол-во выдан.</p>
        <p class="oth" style="width:50px;">Кол-во</p>
        <p class="oth" style="width:90px;">Дата выдачи</p>
        <p class="oth">Издательство</p>
        <p class="oth">Автор</p>
        <p class="name">Название</p>
    </div>
    <div class="middle">
        <?php if(count($this->books) > 0): ?>
            <?php foreach ($this->books as $book): ?>
                <p class="oth" style="width:100px;"><?php echo $book->tcount; ?></p>
                <p class="oth" style="width:50px;"><?php echo $book->count; ?></p>
                <p class="oth" style="width:90px;">&nbsp;<?php echo $book->datet; ?></p>
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


