<div class="middle0">
    <h1><a href="<?php echo $this->url(array(), 'readers'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> Обновление читателя</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->sername->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->sername->renderViewHelper(); ?>
                        <?php if ($this->updateReader->sername->getMessages()) echo $this->formErrors($this->updateReader->sername->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->name->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->name->renderViewHelper(); ?>
                        <?php if ($this->updateReader->name->getMessages()) echo $this->formErrors($this->updateReader->name->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->datebirth->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->datebirth->renderViewHelper(); ?><img src="<?php echo $this->img . '/calendar.png'; ?>" style="cursor: pointer; vertical-align:middle;" id="f_trigger_c" title="Выбор даты с помощью календаря" alt="Выбор даты с помощью календаря" />
                        <?php if ($this->updateReader->datebirth->getMessages()) echo $this->formErrors($this->updateReader->datebirth->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->address->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->address->renderViewHelper(); ?>
                        <?php if ($this->updateReader->address->getMessages()) echo $this->formErrors($this->updateReader->address->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->contphone->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->contphone->renderViewHelper(); ?>
                        <?php if ($this->updateReader->contphone->getMessages()) echo $this->formErrors($this->updateReader->contphone->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->sex->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->sex->renderViewHelper(); ?>
                        <?php if ($this->updateReader->sex->getMessages()) echo $this->formErrors($this->updateReader->sex->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->email->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->email->renderViewHelper(); ?>
                        <?php if ($this->updateReader->email->getMessages()) echo $this->formErrors($this->updateReader->email->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateReader->password->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateReader->password->renderViewHelper(); ?>
                        <?php if ($this->updateReader->password->getMessages()) echo $this->formErrors($this->updateReader->password->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->updateReader->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->updateReader->renderForm($this->placeholder('form')->render); ?>
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

