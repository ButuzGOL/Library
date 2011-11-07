<div class="middle2" style="width:65%;">
    <h1>Прием книг</h1>
    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <?php echo $this->rBooks->readerid->getLabel(); ?> 
                <?php echo $this->rBooks->readerid->renderViewHelper(); ?>
                <br /> <br />
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->rBooks->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->rBooks->renderForm($this->placeholder('form')->render); ?>
        </div>
    </div>
</div>

<div class="middle0">
    <div class="head" style="font-weight:bold">
        <p class="act">Действия</p>
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
                <p class="act">
                    <input type="text" value="1" id="rbookcount<?php echo $book->id; ?>" />
                    <img src="<?php echo $this->img . '/rbook.png'; ?>" alt="Принять" title="Принять" style="vertical-align:middle; cursor:pointer;" onclick="callAjaxRbook('<?php echo $this->readerid; ?>', '<?php echo $book->id; ?>', <?php echo $this->baseUrl; ?>);" /> <span style="color:;" id="bull<?php echo $book->id; ?>">&bull;</span>
                </p>
                <p class="oth" id="rbookcountt<?php echo $book->id; ?>" style="width:100px;"><?php echo $book->tcount; ?></p>
                <p class="oth" id="rbookcountg<?php echo $book->id; ?>" style="width:50px;"><?php echo $book->count; ?></p>
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


