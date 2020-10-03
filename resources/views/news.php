<?php include "menu.php";?>
<h1>Новости</h1>
<?php foreach ($news as $item): ?>
    <a href="<?=route('NewsOne', $item['id'])?>"><?=$item['title']?></a><br>
<?php endforeach; ?>
