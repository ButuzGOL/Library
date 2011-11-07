<div class="middle0">
    <h1><a href="<?php echo $this->url(array(), 'readers'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> Добавление читателя</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->sername->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->sername->renderViewHelper(); ?>
                        <?php if ($this->addReader->sername->getMessages()) echo $this->formErrors($this->addReader->sername->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->name->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->name->renderViewHelper(); ?>
                        <?php if ($this->addReader->name->getMessages()) echo $this->formErrors($this->addReader->name->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->datebirth->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->datebirth->renderViewHelper(); ?><img src="<?php echo $this->img . '/calendar.png'; ?>" style="cursor: pointer; vertical-align:middle;" id="f_trigger_c" title="Выбор даты с помощью календаря" alt="Выбор даты с помощью календаря" />
                        <?php if ($this->addReader->datebirth->getMessages()) echo $this->formErrors($this->addReader->datebirth->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->address->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->address->renderViewHelper(); ?>
                        <?php if ($this->addReader->address->getMessages()) echo $this->formErrors($this->addReader->address->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->contphone->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->contphone->renderViewHelper(); ?>
                        <?php if ($this->addReader->contphone->getMessages()) echo $this->formErrors($this->addReader->contphone->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->sex->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->sex->renderViewHelper(); ?>
                        <?php if ($this->addReader->sex->getMessages()) echo $this->formErrors($this->addReader->sex->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->email->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->email->renderViewHelper(); ?>
                        <?php if ($this->addReader->email->getMessages()) echo $this->formErrors($this->addReader->email->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addReader->password->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addReader->password->renderViewHelper(); ?>
                        <?php if ($this->addReader->password->getMessages()) echo $this->formErrors($this->addReader->password->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->addReader->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->addReader->renderForm($this->placeholder('form')->render); ?>
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
        inputField     :    "datebirth",
        ifFormat       :    "%d.%m.%Y",
        button         :    "f_trigger_c",
        align          :    "Br",
        timeFormat     :    "24",
        showsTime      :    false,
        singleClick    :    true
    });
/* ]]> */
</script>

