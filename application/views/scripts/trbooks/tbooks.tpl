<div class="middle2">
    <h1>Выдача книг</h1>
    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <?php echo $this->tBooks->readerid->getLabel(); ?> 
                <?php echo $this->tBooks->readerid->renderViewHelper(); ?>
                <?php echo $this->tBooks->wbooks->renderViewHelper(); ?>
                <br /> <br />
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->tBooks->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->tBooks->renderForm($this->placeholder('form')->render); ?>
        </div>
    </div>
</div>

<div class="middle0">
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
                    <input type="text" value="1" id="tbookcount<?php echo $book->id; ?>" />
                    <img src="<?php echo $this->img . '/tbook.png'; ?>" alt="Выдать" title="Выдать" style="vertical-align:middle; cursor:pointer;" onclick="callAjaxTbook('<?php echo $this->readerid; ?>', '<?php echo $book->id; ?>', <?php echo $this->baseUrl; ?>);" /> <span style="color:;" id="bull<?php echo $book->id; ?>">&bull;</span>
                </p>
                <p class="oth" id="tbookcountg<?php echo $book->id; ?>"><?php echo $book->count; ?></p>
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


