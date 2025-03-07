<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RackRow $rackRow
 * @var \App\Model\Entity\Cell[]|\Cake\Collection\CollectionInterface $cells
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rackRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rackRow->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rack Rows'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="rackRows form content">
    <?= $this->Form->create($rackRow) ?>
    <fieldset>
        <legend><?= __('Edit Rack Row') ?></legend>
        <?php
            echo $this->Form->control('row_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
