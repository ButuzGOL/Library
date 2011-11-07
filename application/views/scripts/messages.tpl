<div <?php if($this->type == 1) echo "class='mess'"; else echo "class='mess_er'"; ?>>
    <?php foreach ($this->messages as $message) : ?>
        <p> <?php echo $message; ?> </p>
    <?php endforeach;?>
</div>
