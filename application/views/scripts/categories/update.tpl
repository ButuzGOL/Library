<div class="middle0">
    <h1><a href="<?php echo $this->url(array(), 'categories'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> Обновление категории</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->updateCategory->name->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->updateCategory->name->renderViewHelper(); ?>
                        <?php if ($this->updateCategory->name->getMessages()) echo $this->formErrors($this->updateCategory->name->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->updateCategory->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->updateCategory->renderForm($this->placeholder('form')->render); ?>
        </div>
    </div>
</div>
