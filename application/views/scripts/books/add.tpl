<div class="middle0">
    <h1><a href="<?php echo $this->url(array(), 'books'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> Добавление книги</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->title->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->title->renderViewHelper(); ?>
                        <?php if ($this->addBook->title->getMessages()) echo $this->formErrors($this->addBook->title->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->author->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->author->renderViewHelper(); ?>
                        <?php if ($this->addBook->author->getMessages()) echo $this->formErrors($this->addBook->author->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->categoryid->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->categoryid->renderViewHelper(); ?>
                        <?php if ($this->addBook->categoryid->getMessages()) echo $this->formErrors($this->addBook->categoryid->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->count->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->count->renderViewHelper(); ?>
                        <?php if ($this->addBook->count->getMessages()) echo $this->formErrors($this->addBook->count->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->publication->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->publication->renderViewHelper(); ?>
                        <?php if ($this->addBook->publication->getMessages()) echo $this->formErrors($this->addBook->publication->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->placepublication->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->placepublication->renderViewHelper(); ?>
                        <?php if ($this->addBook->placepublication->getMessages()) echo $this->formErrors($this->addBook->placepublication->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->yearpublication->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->yearpublication->renderViewHelper(); ?>
                        <?php if ($this->addBook->yearpublication->getMessages()) echo $this->formErrors($this->addBook->yearpublication->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->countpages->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->countpages->renderViewHelper(); ?>
                        <?php if ($this->addBook->countpages->getMessages()) echo $this->formErrors($this->addBook->countpages->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->price->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->price->renderViewHelper(); ?>
                        <?php if ($this->addBook->price->getMessages()) echo $this->formErrors($this->addBook->price->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->isbn->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->isbn->renderViewHelper(); ?>
                        <?php if ($this->addBook->isbn->getMessages()) echo $this->formErrors($this->addBook->isbn->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->datecome->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->datecome->renderViewHelper(); ?><img src="<?php echo $this->img . '/calendar.png'; ?>" style="cursor: pointer; vertical-align:middle;" id="f_trigger_c" title="Выбор даты с помощью календаря" alt="Выбор даты с помощью календаря" /> <?php echo $this->addBook->datecomett->renderViewHelper(); ?> <?php echo $this->addBook->datecomett->getLabel(); ?>
                        <?php if ($this->addBook->datecome->getMessages()) echo $this->formErrors($this->addBook->datecome->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->img->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <input 
                        type="file"
                        name="<?php echo $this->addBook->img->getName(); ?>"
                    />
                    <?php if ($this->addBook->img->getMessages()) echo $this->formErrors($this->addBook->img->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->shortstory->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->shortstory->renderViewHelper(); ?>
                        <?php if ($this->addBook->shortstory->getMessages()) echo $this->formErrors($this->addBook->shortstory->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addBook->fullstory->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addBook->fullstory->renderViewHelper(); ?>
                        <?php if ($this->addBook->fullstory->getMessages()) echo $this->formErrors($this->addBook->fullstory->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->addBook->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->addBook->renderForm($this->placeholder('form')->render); ?>
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
