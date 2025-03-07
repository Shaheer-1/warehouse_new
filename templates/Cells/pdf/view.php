<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>
<h1>QR Code</h1>
<?= $this->QrCode->image('Hello, CakePHP!', [
    'size' => 200,
    'format' => 'png',
]) ?>