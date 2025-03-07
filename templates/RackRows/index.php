<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RackRow[]|\Cake\Collection\CollectionInterface $rackRows
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Rack Row'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cells'), ['controller' => 'Cells', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cell'), ['controller' => 'Cells', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table id="example" class="table table-striped">
    <thead>
    <tr>
        <!-- <th scope="col"><?= $this->Paginator->sort('id') ?></th> -->
        <th scope="col"><?= $this->Paginator->sort('row_code') ?></th>
        <th scope="col"><?= 'Online' ?></th>
        <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th> -->
        <!-- <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($rackRows as $rackRow) : 
            $url = $this->Url->build($this->getRequest()->getPath(), ['fullBase' => true]).'/rowinfo/'.$rackRow->id;
            $modalInfo = h($rackRow->row_code);
        ?>
        <tr>
            <!-- <td><?= h($rackRow->id) ?></td> -->
            <td><?= h($rackRow->row_code) ?></td>
            <td class="actions qr-code-container">
                <button id="<?=$rackRow->id?>" onclick="openModal(this)" data-id="<?=$url?>" data-heading="<?= $modalInfo?>" class="btn btn-outline-info btn-sm"><?=$this->Html->icon('qr-code') ?></button>
            </td>
            <!-- <td><?= h($rackRow->created) ?></td> -->
            <!-- <td><?= h($rackRow->modified) ?></td> -->
            <td class="actions">
                <?= $this->Html->link(
                    $this->Html->icon('eye-fill'),
                    ['action' => 'view', $rackRow->id], 
                    [
                        'title' => __('View'), 
                        'class' => 'btn btn-outline-info btn-sm',
                        'escape' => false
                    ]
                ) ?>
                <?= $this->Html->link(
                    $this->Html->icon('pen'),
                    ['action' => 'edit', $rackRow->id],
                    [
                        'title' => __('Edit'),
                        'class' => 'btn btn-outline-primary btn-sm',
                        'escape' => false
                    ]
                ) ?>
                <?= $this->Form->postLink(
                    $this->Html->icon('trash'),
                    ['action' => 'delete', $rackRow->id],
                    [
                        'confirm' => __('Are you sure you want to delete {0}?', $rackRow->row_code),
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

<div id="printModal" class="modal" >
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="printableContent">
            <h3 id="modal_h"><?= $cell->rack_row->row_code." - ".$cell->cell_code ?></h3>
            <div id="qrcode" style="width: 300px; margin: 0 auto; padding: 10px; text-align: center;"></div>
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