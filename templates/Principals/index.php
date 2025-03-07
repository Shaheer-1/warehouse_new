<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Principal[]|\Cake\Collection\CollectionInterface $principals
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Principal'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table id="example" class="h-25 table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('principal_name') ?></th>
        <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($principals as $principal) : ?>
        <tr>
            <td><?= h($principal->principal_name) ?></td>
            <!-- <td><?= h($principal->created) ?></td> -->
            <!-- <td><?= h($principal->modified) ?></td> -->
            <td class="actions">
                <?= $this->Html->link(
                        $this->Html->icon('eye-fill'),
                        ['action' => 'view', $principal->id], 
                        [
                            'title' => __('View'),
                            'class' => 'btn btn-outline-info btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                <?= $this->Html->link(
                    $this->Html->icon('pen'),
                    ['action' => 'edit', $principal->id],
                    [
                        'title' => __('Edit'),
                        'class' => 'btn btn-outline-primary btn-sm',
                        'escape' => false
                    ]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->icon('trash'),
                    [
                        'action' => 'delete', $principal->id],
                        [
                            'confirm' => __('Are you sure you want to delete {0}?',$principal->principal_name),
                            'title' => __('Delete'),
                            'class' => 'btn btn-outline-danger btn-sm',
                            'escape' => false
                        ]
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

