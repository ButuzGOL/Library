<div class="middle1">
    <h1>Aвторизация</h1>    <div class="forma">
        <div class="form">
          <?php $this->placeholder('form')->captureStart('SET', 'render'); ?>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->login->email->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->login->email->renderViewHelper(); ?>
                        <?php if ($this->login->email->getMessages()) echo $this->formErrors($this->login->email->getMessages()); ?>
                    </p>
                </div>
                <div class="polya">
                    <p class="pleft">
                        <?php echo $this->login->password->getLabel(); ?>
                    </p>
                    <p class="pright">
                        <?php echo $this->login->password->renderViewHelper(); ?>
                        <?php if ($this->login->password->getMessages()) echo $this->formErrors($this->login->password->getMessages()); ?>
                    </p>
                </div>
                <p class="submit">
                    <input 
                        type="submit"
                        class="submit"
                        value="<?php echo $this->login->submit->getLabel(); ?>"
                    />
                </p>
            <?php $this->placeholder('form')->captureEnd(); ?>
            <?php echo $this->login->renderForm($this->placeholder('form')->render); ?>
        </div>
    </div>
</div>
