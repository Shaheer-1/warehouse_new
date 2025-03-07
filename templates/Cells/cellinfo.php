<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>
<!-- Cell name - Principal-ku-product -->
<div class="cells view large-9 medium-8 columns content">
    <!-- <h3><?= h($cell->cell_code) ?></h3> -->
    <div class="table-responsive">
        <table class="table table-striped">
            <!-- <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($cell->id) ?></td>
            </tr> -->
            <?php
            // pr($cell);exit;
            ?>
            <tr>
                <th class="col-md-2" scope="row"><?= __('ROW :') ?></th>
                <td><?= $cell->hasValue('rack_row') ? $this->Html->link($cell->rack_row->row_code, ['controller' => 'RackRows', 'action' => 'view', $cell->rack_row->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('CELL NAME :') ?></th>
                <td><?= h($cell->cell_code) ?></td>
            </tr>
            <!-- <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($cell->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($cell->modified) ?></td>
            </tr> -->
        </table>
    </div>
    <?php
    // pr($cell);exit;
    ?>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($cell->products)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('No.') ?></th>
                    <th scope="col"><?= __('Principal') ?></th>
                    <th scope="col"><?= __('Sku') ?></th>
                    <th scope="col"><?= __('Product Details') ?></th>
                    <!-- <th scope="col"><?= __('Created') ?></th> -->
                    <th scope="col"><?= __('Modified') ?></th>
                </tr>
                <?php foreach ($cell->products as $key => $products): ?>
                <tr>
                    <td><?= ++$key ?></td>
                    <td><?= h($products->principal->principal_name) ?></td>
                    <td><?= h($products->sku) ?></td>
                    <td><?= h($products->principal->principal_name)." ".h($products->product_details) ?></td>
                    <!-- <td><?= h($products->created) ?></td> -->
                    <td><?= h($products->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
