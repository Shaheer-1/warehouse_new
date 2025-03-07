<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Product'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Principals'), ['controller' => 'Principals', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Principal'), ['controller' => 'Principals', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table id="example" class="table table-striped">
    <thead>
    <tr>
        <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
        <th scope="col"><?= $this->Paginator->sort('principal_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('sku') ?></th>
        <th scope="col"><?= $this->Paginator->sort('product_details') ?></th>
        <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th> -->
        <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
        <tr>
            <!-- <td><?= h($product->id) ?></td> -->
            <td><?= $product->hasValue('principal') ? $this->Html->link($product->principal->principal_name, ['controller' => 'Principals', 'action' => 'view', $product->principal->id]) : '' ?></td>
            <td><?= h($product->sku) ?></td>
            <td><?= h($product->product_details) ?></td>
            <!-- <td><?= h($product->created) ?></td> -->
            <!-- <td><?= h($product->modified) ?></td> -->
            <td class="actions">
                <?= $this->Html->link($this->Html->icon('eye-fill'), [
                        'action' => 'view', $product->id
                    ], [
                        'title' => __('View'),
                        'class' => 'btn btn-outline-info btn-sm',
                        'escape' => false
                    ]) ?>
                <?= $this->Html->link($this->Html->icon('pen'), [
                        'action' => 'edit', $product->id
                    ], [
                        'title' => __('Edit'),
                        'class' => 'btn btn-outline-primary btn-sm',
                        'escape' => false
                    ]) ?>
                <?= $this->Form->postLink($this->Html->icon('trash'), [
                        'action' => 'delete', $product->id
                    ], [
                        'confirm' => __('Are you sure you want to delete # {0}?', $product->id),
                        'title' => __('Delete'),
                        'class' => 'btn btn-outline-danger btn-sm',
                        'escape' => false
                    ]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- <div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('«', ['label' => __('First')]) ?>
        <?= $this->Paginator->prev('‹', ['label' => __('Previous')]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›', ['label' => __('Next')]) ?>
        <?= $this->Paginator->last('»', ['label' => __('Last')]) ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div> -->
