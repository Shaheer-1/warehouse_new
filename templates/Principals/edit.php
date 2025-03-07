<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Principal $principal
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $principal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $principal->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Principals'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="principals form content">
    <?= $this->Form->create($principal) ?>
    <fieldset>
        <legend><?= __('Edit Principal') ?></legend>
        <?php
            echo $this->Form->control('principal_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
