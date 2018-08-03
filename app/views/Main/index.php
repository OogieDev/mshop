<h1>hello world</h1>

<?= $name; ?>
<br>
<?= $age; ?>

<?php foreach($posts as $post): ?>
    <h2><?=$post['title']?></h2>
<?php endforeach; ?>
