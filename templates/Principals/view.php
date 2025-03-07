<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Principal $principal
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Principal'), ['action' => 'edit', $principal->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Principal'), ['action' => 'delete', $principal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $principal->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Principals'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Principal'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="principals view large-9 medium-8 columns content">
    <h3><?= h($principal->principal_name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <!-- <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($principal->id) ?></td>
            </tr> -->
            <tr>
                <th scope="row"><?= __('Principal Name') ?></th>
                <td><?= h($principal->principal_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($principal->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($principal->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($principal->products)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <!-- <th scope="col"><?= __('Id') ?></th> -->
                    <!-- <th scope="col"><?= __('Principal Id') ?></th> -->
                    <th scope="col"><?= __('Sku') ?></th>
                    <th scope="col"><?= __('Product Details') ?></th>
                    <!-- <th scope="col"><?= __('Created') ?></th> -->
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($principal->products as $products): ?>
                <tr>
                    <!-- <td><?= h($products->id) ?></td> -->
                    <!-- <td><?= h($products->principal_id) ?></td> -->
                    <td><?= h($products->sku) ?></td>
                    <td><?= h($products->product_details) ?></td>
                    <!-- <td><?= h($products->created) ?></td> -->
                    <td><?= h($products->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
