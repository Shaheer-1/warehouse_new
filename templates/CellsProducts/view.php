<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CellsProduct $cellsProduct
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Cells Product'), ['action' => 'edit', $cellsProduct->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Cells Product'), ['action' => 'delete', $cellsProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cellsProduct->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cells Products'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Cells Product'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="cellsProducts view large-9 medium-8 columns content">
    <h3><?= h($cellsProduct->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($cellsProduct->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Cell') ?></th>
                <td><?= $cellsProduct->hasValue('cell') ? $this->Html->link($cellsProduct->cell->cell_code, ['controller' => 'Cells', 'action' => 'view', $cellsProduct->cell->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Product') ?></th>
                <td><?= $cellsProduct->hasValue('product') ? $this->Html->link($cellsProduct->product->sku, ['controller' => 'Products', 'action' => 'view', $cellsProduct->product->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($cellsProduct->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($cellsProduct->modified) ?></td>
            </tr>
        </table>
    </div>
</div>
