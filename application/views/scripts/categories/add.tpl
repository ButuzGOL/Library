<div class="middle0">
    <h1><a href="<?php echo $this->url(array(), 'categories'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> Добавление категории</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->addCategory->name->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->addCategory->name->renderViewHelper(); ?>
                        <?php if ($this->addCategory->name->getMessages()) echo $this->formErrors($this->addCategory->name->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->addCategory->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->addCategory->renderForm($this->placeholder('form')->render); ?>
        </div>
    </div>
</div>
