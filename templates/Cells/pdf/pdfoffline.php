<!DOCTYPE html>
<html>
    <?php
    echo $this->Html->image('logo.png', ['fullBase' => true]);
    echo $this->Html->css('bootstrap.css', ['fullBase' => true]);
    ?>
<head>
    <title>PDF Title</title>
</head>
<body>
    <?= $this->fetch('content') ?>
    
</body>
</html>