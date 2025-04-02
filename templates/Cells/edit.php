<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 * @var \App\Model\Entity\RackRow[]|\Cake\Collection\CollectionInterface $rackRows
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cell->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cell->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rack Rows'), ['controller' => 'RackRows', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Rack Row'), ['controller' => 'RackRows', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="cells form content">
    <?= $this->Form->create($cell) ?>
    <?php
    // $options = '';
    // foreach ($products as $key => $value) {
    //     # code...
    //     $selected = '';
    //     foreach($cell['products'] as $k => $v){
    //         if($v['id'] == $key){
    //             $selected = 'selected="selected"';
    //             break;
    //         }
    //     }
    //     $options .= "<option ".$selected." value=".$key." >".$value."</option>";
    // }
    ?>
    <fieldset>
        <legend><?= __('Edit Cell') ?></legend>
        <?php
            echo $this->Form->control('rack_row_id', ['options' => $rackRows]);
            echo $this->Form->control('cell_code');
            // echo $this->Form->control(
            //     'Products',
            //     [
            //         'options' => $products,
            //         'data-search' => true,
            //         'data-silent-initial-value-set' => true,
            //         'maxlength' => "255",
            //     ]
            // ); 
            echo $this->Form->control('Products', 
                [
                    'type' => 'select',
                    'options' => $products,
                    'multiple' => true,
                    'required' => true,
                    'label' => true,
                    'id' => 'Products',
                    'placeholder' => 'Products',
                    'data-search' => 'true',
                    'data-silent-initial-value-set' => true,
                    'maxlength' => 255,
                ]
            );
            
            ?>
            <!-- <div class="mb-3 text required">
                <label class="form-label" for="products">Products</label>
                <br/>
                <select required="required" id="Products" multiple name="Products" placeholder="Products" data-search="true" data-silent-initial-value-set="true"  maxlength="255">
                    <?= $options; ?>
                </select>
            </div> -->
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
