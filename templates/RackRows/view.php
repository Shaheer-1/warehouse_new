<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RackRow $rackRow
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Rack Row'), ['action' => 'edit', $rackRow->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Rack Row'), ['action' => 'delete', $rackRow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rackRow->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rack Rows'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Rack Row'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="rackRows view large-9 medium-8 columns content">
    <h3><?= h($rackRow->row_code) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <!-- <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($rackRow->id) ?></td>
            </tr> -->
            <tr>
                <th scope="row"><?= __('Row Code') ?></th>
                <td><?= h($rackRow->row_code) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created At') ?></th>
                <td><?= h($rackRow->created) ?></td>
            </tr>
            <!-- <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($rackRow->modified) ?></td>
            </tr> -->
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Cells') ?></h4>
        <?php if (!empty($rackRow->cells)): ?>
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
                <?php foreach ($rackRow->cells as $cells): ?>
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
