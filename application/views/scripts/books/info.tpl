<div class="post">
    <a href="<?php echo $this->url(array(), 'books'); ?>"><img src="<?php echo $this->img . '/back.png'; ?>" title="Назад" alt="Назад" /></a> <span style="font-size:24px; font-weight:bold;"><?php echo $this->book['title']; ?></span>
    <div class="text">
        <img src="<?php echo $this->baseUrl . 'image/resize?filename=' . $this->baseUrl . 'uploads/' . $this->book['img']; ?>&width=210&height=250" alt="<?php echo $this->book['title']; ?>" title="<?php echo $this->book['title']; ?>" style="float:left; margin-right:10px;" />
        <span class="a">
            <b>Автор:</b> <?php echo $this->book['author']; ?><br />
            <b>Кол-во стр.:</b> <?php echo $this->book['countpages']; ?><br />
            <b>Публикация:</b> <?php echo $this->book['publication']; ?><br />
            <b>Год публикация:</b> <?php echo $this->book['yearpublication']; ?><br />
            <b>Место публикации:</b> <?php echo $this->book['placepublication']; ?><br />
            <b>ISBN:</b> <?php echo $this->book['isbn']; ?><br />
            <b>Кол-во:</b> <?php echo $this->book['count']; ?><br />
            <b>Цена:</b> <?php echo $this->book['price']; ?><br />
            <b>Дата поступления книги:</b> <?php echo $this->book['datecome']; ?><br />
            <?php echo $this->book['categoryid']; ?><br /><br />
        </span>
        <?php echo $this->book['fullstory']; ?>
    </div>
    <div style="clear:both;"></div></div>


