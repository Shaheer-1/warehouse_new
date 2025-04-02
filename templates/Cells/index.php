<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell[]|\Cake\Collection\CollectionInterface $cells
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Cell'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rack Rows'), ['controller' => 'RackRows', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Rack Row'), ['controller' => 'RackRows', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table id="example" class="table table-striped" style="width:100%">
    <thead>
    <tr>
        <!-- <th></th> -->
        <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
        <th scope="col"><?= $this->Paginator->sort('rack_row_id', 'ROWS') ?></th>
        <th scope="col"><?= $this->Paginator->sort('cell_code', 'CELL NAME') ?></th>
        <th scope="col"><?= $this->Paginator->sort('principal_name', 'PRINCIPAL') ?></th>
        <th scope="col"><?= $this->Paginator->sort('sku', 'SKU') ?></th>
        <th scope="col"><?= $this->Paginator->sort('product_details', 'PRODUCT DETAIL') ?></th>
        <th scope="col"><?= __('Online') ?></th>
        <th scope="col"><?= __('Offline') ?></th>
        <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th> -->
        <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php //pr($cells);exit; ?>
        <?php foreach ($cells as $cell) : ?>
            <?php $info = '';
            $modalInfo = h($cell->cell_code);
            foreach ($cell->products as $key => $value) { 
                $info .= ++$key.") ".
                h($cell->cell_code).
                "-".
                h($value->principal->principal_name).
                "-".
                h($value->sku).
                "-".
                h($value->product_details).
                "\n";
            }
            ?>
            <?php
            if($cell->products ){
                foreach ($cell->products as $key => $value) { 
                    $url = $this->Url->build($this->getRequest()->getPath(), ['fullBase' => true]).'/cellinfo/'.$cell->id;
                ?>
            <tr>
                <!-- <td>
                </td> -->
                <!-- <td><?= h($cell->id) ?></td> -->
                <td><?= $cell->hasValue('rack_row') ? 
                    $this->Html->link($cell->rack_row->row_code, ['controller' => 'RackRows', 'action' => 'view', $cell->rack_row->id]) : '' 
                ?></td>
                <td><?= h($cell->cell_code) ?></td>
                <td><?= h($value->principal->principal_name) ?></td>
                <td><?= h($value->sku) ?></td>
                <td><?= h($value->principal->principal_name)."&nbsp;&nbsp;&nbsp;".h($value->product_details) ?></td>
                <td class="actions">
                    <button id="<?=$cell->id?>" onclick="openModal(this)" data-id="<?=$url?>" data-heading="<?= $modalInfo?>" class="btn btn-outline-info btn-sm"><?=$this->Html->icon('qr-code') ?></button>
                </td>
                <td class="actions">
                    <button id="<?="o_".$cell->id?>" onclick="openModal(this)" data-id="<?=$info?>" data-heading="<?= $modalInfo?>" class="btn btn-dark btn-sm"><?= $this->Html->icon('qr-code') ?></button>
                </td>
                <!-- <td><?= h($cell->created) ?></td> -->
                <!-- <td><?= h($cell->modified) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(
                        $this->Html->icon('eye-fill'),
                        ['action' => 'view', $cell->id],
                        [
                            'title' => __('View'),
                            'class' => 'btn btn-outline-info btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        $this->Html->icon('pen'),
                        ['action' => 'edit', $cell->id],
                        [
                            'title' => __('Edit'),
                            'class' => 'btn btn-outline-primary btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Form->postLink(
                        $this->Html->icon('trash'),
                        ['action' => 'delete', $value->_joinData->id],
                        [
                            'confirm' => __('Are you sure you want to delete {0}?',
                            $cell->cell_code),
                            'title' => __('Delete'),
                            'class' => 'btn btn-outline-danger btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                </td>
            </tr>
            <?php 
            }
            }else{
                $url = $this->Url->build($this->getRequest()->getPath(), ['fullBase' => true]).'/cellinfo/'.$cell->id;
            ?>
            <tr>
                <!-- <td></td> -->
                <td><?= $cell->hasValue('rack_row') ? 
                    $this->Html->link($cell->rack_row->row_code, ['controller' => 'RackRows', 'action' => 'view', $cell->rack_row->id]) : '' 
                ?></td>
                <td><?= h($cell->cell_code) ?></td>
                <td><?= 'EMPTY' ?></td>
                <td><?= 'EMPTY' ?></td>
                <td><?= 'EMPTY' ?></td>
                <td class="actions">
                    <button id="<?=$cell->id?>" onclick="openModal(this)" data-id="<?=$url?>" data-heading="<?= $modalInfo?>" class="btn btn-outline-info btn-sm"><?=$this->Html->icon('qr-code') ?></button>
                </td>
                <td class="actions">
                    <button id="<?="o_".$cell->id?>" onclick="openModal(this)" data-id="<?=$info?>" data-heading="<?= $modalInfo?>" class="btn btn-dark btn-sm"><?= $this->Html->icon('qr-code') ?></button>
                </td>
                <td class="actions">
                    <?= $this->Html->link(
                        $this->Html->icon('eye-fill'),
                        ['action' => 'view', $cell->id],
                        [
                            'title' => __('View'),
                            'class' => 'btn btn-outline-info btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        $this->Html->icon('pen'),
                        ['action' => 'edit', $cell->id],
                        [
                            'title' => __('Edit'),
                            'class' => 'btn btn-outline-primary btn-sm',
                            'escape' => false
                        ]
                    ) ?>
                </td>
            </tr>
            <?php
            }
           
        endforeach; ?>
    </tbody>
</table>
<div id="printModal" class="modal" >
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="printableContent">
            <div>
                <h3 id="modal_h"><?= $cell->cell_code ?></h3>
            </div>
            <div id="qrcode" style="width: 300px; margin: 0 auto; padding: 10px; text-align: center;">

            </div>
        </div>
        <button onclick="printModalContent()" class="btn btn-outline-primary">Print</button>
    </div>
</div>


<style>
/* Basic Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
    background: #fff;
    padding: 20px;
    width: 40%;
    margin: 5% auto;
    text-align: center;
    border-radius: 5px;
}

.close {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 24px;
    cursor: pointer;
}
</style>
<script>
function openModal(button) {
    
    console.log("Button Text:", button.innerText);
    console.log("Button ID:", button.id);
    console.log("Button Class:", button.className);
    console.log("Custom Data Attribute:", button.dataset.id);

    var qr = new QRCode(document.getElementById("qrcode"), {
        text: button.dataset.id,
    });
    
    document.getElementById("modal_h").innerHTML = button.dataset.heading;
    document.getElementById("printModal").style.display = "block";
}

function closeModal() {
    document.getElementById("printModal").style.display = "none";
    document.getElementById("qrcode").innerHTML = '';
}

function printModalContent() {
    var printContents = document.getElementById('printableContent').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
    location.reload(); // Restore the original page
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
