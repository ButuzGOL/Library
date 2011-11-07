<?php if(count($this->books) > 0): $k = 0; if(count($this->books) == 1) $k = 1;?>
    <?php foreach ($this->books as $book): ?>
        <div class="post<?php echo $k; ?>">
            <a href="<?php echo $this->url(array('Id' => $book->id), 'book'); ?>" style="font-size:24px; font-weight:bold;"><?php echo $book->title; ?></a> <img src="<?php echo $this->img . '/' . $book->bookmark; ?>.png" alt="Закладка" title="Закладка" style="cursor:pointer;" onclick="callAjaxBookmark('bookmark<?php echo $book->id; ?>', '<?php echo $book->id; ?>', <?php echo $this->baseUrl; ?>);" id="bookmark<?php echo $book->id; ?>" />
            <div class="text">
                <img src="<?php echo $this->baseUrl . 'image/resize?filename=' . $this->baseUrl . 'uploads/' . $book->img; ?>&width=190&height=220" alt="<?php echo $book->title; ?>" title="<?php echo $book->title; ?>" style="float:left; margin-right:10px;" />
                <span class="a">
                    <b>Автор:</b> <?php echo $book->author; ?><br />
                    <b>Кол-во стр.:</b> <?php echo $book->countpages; ?><br />
                    <b>Публикация:</b> <?php echo $book->publication; ?><br />
                    <b>Год публикация:</b> <?php echo $book->yearpublication; ?><br />
                    <b>ISBN:</b> <?php echo $book->isbn; ?><br />
                    <b>Кол-во:</b> <?php echo $book->count; ?><br />
                    <?php echo $book->categoryid; ?><br /><br />
                </span>
                <?php echo $book->shortstory; ?></div>
                <div style="clear:both;"></div>
            </div>
        <?php if(!$k) $k = 1; ?>
    <?php endforeach; ?>
<?php endif; ?>

