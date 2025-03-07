<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Principals'), ['controller' => 'Principals', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Principal'), ['controller' => 'Principals', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->sku) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <!-- <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($product->id) ?></td>
            </tr> -->
            <tr>
                <th scope="row"><?= __('Principal') ?></th>
                <td><?= $product->hasValue('principal') ? $this->Html->link($product->principal->principal_name, ['controller' => 'Principals', 'action' => 'view', $product->principal->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Sku') ?></th>
                <td><?= h($product->sku) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Product Details') ?></th>
                <td><?= h($product->product_details) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($product->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($product->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Cells') ?></h4>
        <?php if (!empty($product->cells)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <!-- <th scope="col"><?= __('Id') ?></th> -->
                    <!-- <th scope="col"><?= __('Rack Row Id') ?></th> -->
                    <th scope="col"><?= __('Cell Code') ?></th>
                    <!-- <th scope="col"><?= __('Created') ?></th> -->
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($product->cells as $cells): ?>
                <tr>
                    <!-- <td><?= h($cells->id) ?></td> -->
                    <!-- <td><?= h($cells->rack_row_id) ?></td> -->
                    <td><?= h($cells->cell_code) ?></td>
                    <!-- <td><?= h($cells->created) ?></td> -->
                    <td><?= h($cells->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Cells', 'action' => 'view', $cells->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Cells', 'action' => 'edit', $cells->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Cells', 'action' => 'delete', $cells->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cells->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
