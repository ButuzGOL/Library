<div class="middle0">
    <h1><a href="<?php echo $this->url(array(), 'books'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> Обновить книгу</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->title->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->title->renderViewHelper(); ?>
                        <?php if ($this->updateBook->title->getMessages()) echo $this->formErrors($this->updateBook->title->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->author->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->author->renderViewHelper(); ?>
                        <?php if ($this->updateBook->author->getMessages()) echo $this->formErrors($this->updateBook->author->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->categoryid->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->categoryid->renderViewHelper(); ?>
                        <?php if ($this->updateBook->categoryid->getMessages()) echo $this->formErrors($this->updateBook->categoryid->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->count->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->count->renderViewHelper(); ?>
                        <?php if ($this->updateBook->count->getMessages()) echo $this->formErrors($this->updateBook->count->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->publication->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->publication->renderViewHelper(); ?>
                        <?php if ($this->updateBook->publication->getMessages()) echo $this->formErrors($this->updateBook->publication->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->placepublication->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->placepublication->renderViewHelper(); ?>
                        <?php if ($this->updateBook->placepublication->getMessages()) echo $this->formErrors($this->updateBook->placepublication->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->yearpublication->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->yearpublication->renderViewHelper(); ?>
                        <?php if ($this->updateBook->yearpublication->getMessages()) echo $this->formErrors($this->updateBook->yearpublication->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->countpages->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->countpages->renderViewHelper(); ?>
                        <?php if ($this->updateBook->countpages->getMessages()) echo $this->formErrors($this->updateBook->countpages->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->price->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->price->renderViewHelper(); ?>
                        <?php if ($this->updateBook->price->getMessages()) echo $this->formErrors($this->updateBook->price->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->isbn->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->isbn->renderViewHelper(); ?>
                        <?php if ($this->updateBook->isbn->getMessages()) echo $this->formErrors($this->updateBook->isbn->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->datecome->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->datecome->renderViewHelper(); ?><img src="<?php echo $this->img . '/calendar.png'; ?>" style="cursor: pointer; vertical-align:middle;" id="f_trigger_c" title="Выбор даты с помощью календаря" alt="Выбор даты с помощью календаря" /> <?php echo $this->updateBook->datecomett->renderViewHelper(); ?> <?php echo $this->updateBook->datecomett->getLabel(); ?>
                        <?php if ($this->updateBook->datecome->getMessages()) echo $this->formErrors($this->updateBook->datecome->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->img->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <input 
                        type="file"
                        name="<?php echo $this->updateBook->img->getName(); ?>"
                    />
                    <?php if ($this->updateBook->img->getMessages()) echo $this->formErrors($this->updateBook->img->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->shortstory->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->shortstory->renderViewHelper(); ?>
                        <?php if ($this->updateBook->shortstory->getMessages()) echo $this->formErrors($this->updateBook->shortstory->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateBook->fullstory->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateBook->fullstory->renderViewHelper(); ?>
                        <?php if ($this->updateBook->fullstory->getMessages()) echo $this->formErrors($this->updateBook->fullstory->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->updateBook->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->updateBook->renderForm($this->placeholder('form')->render); ?>
        </div>
    </div>
</div>

<style type="text/css">@import url(<?php echo $this->css . '/calendar.css'; ?>);</style>

<script type="text/javascript" src="<?php echo $this->js . '/calendar.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->js . '/calendar-ru.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->js . '/calendar-setup.js'; ?>"></script>
<script type="text/javascript">
/* <![CDATA[ */
    Calendar.setup({
        inputField     :    "datecome",
        ifFormat       :    "%d.%m.%Y",
        button         :    "f_trigger_c",
        align          :    "Br",
        timeFormat     :    "24",
        showsTime      :    false,
        singleClick    :    true
    });
/* ]]> */
</script>
