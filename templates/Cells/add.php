<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cell $cell
 * @var \App\Model\Entity\RackRow[]|\Cake\Collection\CollectionInterface $rackRows
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
use BootstrapUI\View\Helper\FormHelper;
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Cells'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rack Rows'), ['controller' => 'RackRows', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Rack Row'), ['controller' => 'RackRows', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="cells form content ">
    
    <?= $this->Form->create($cell, [
    ]) ?>
    <fieldset>
        <legend><?= __('Add Cell') ?></legend>
        <?php
            echo '<div class="row">';
                echo '<div class="col-md-6">';  
                    echo $this->Form->control('rack_row_id', [
                        'options' => $rackRows
                    ]);
                echo '</div>';
                echo '<div class="col-md-6">';  
                // echo $this->Form->control('products._ids', [
                    //     'options' => $products,
                    //     'class' => 'justify-content-start',
                    // ]);
                echo '</div>';
                echo '</div>';
                    // echo '<div class="row mb-6"></div>';
                echo '<div id="form-container"><div class="row field-set">';
                    echo '<div class="col-md-2">';
                    echo $this->Form->control('cell_code[]',[
                        'label' => [
                            'floating' => true,
                            'text' => 'Cell Code',
                        ]
                    ]);
                    echo '</div>';
                    echo '<div class="col-md-2">';
                        echo $this->Form->control('principal_id[]',[
                            'options' => $principals,
                            'empty' => 'Select one',
                            // 'required' => true,
                            'label' => [
                                'floating' => true,
                                'text' => 'Principal'
                            ],
                        ]);
                    echo '</div>';
                    echo '<div class="col-md-2">';  
                        echo $this->Form->control('sku[]',[
                            'required' => true,
                            'label' => [
                                'floating' => true,
                                'text' => 'SKU',
                            ],
                            'class' => [
                                'femp'
                            ]
                        ]);
                    echo '</div>';
                    echo '<div class="col-md-5">';  
                        echo $this->Form->control('product_details[]',[
                            'required' => true,
                            'label' => [
                                'floating' => true,
                                'text' => 'Product Detail',
                            ],
                            'class' => [
                                'femp'
                            ]
                        ]);
                    echo '</div>';
                    echo '<div id="btn-div" class="col-md-1">'; 
                    ?>
                    <?= $this->Html->link(
                        $this->Html->icon('plus-circle-dotted'),
                        'javascript:void(0);',
                        [
                            'size' => '2xl',
                            'class' => 'add-more btn btn-light btn-sm',
                            'id' => 'add-more',
                            'escape' => false,
                        ]
                    ) ?>
                    <?= $this->Html->link(
                        $this->Html->icon('dash-circle-dotted'),
                        'javascript:void(0);',
                        [
                            'class' => 'remove-field btn btn-danger btn-sm',
                            'id' => 'add-more',
                            'escape' => false,
                        ]
                    ) ?>
                    <?php
                    echo '</div>';
            echo '</div></div>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
$(document).ready(function () {
    $('#form-container').on('click', '.add-more', function () {
        const fieldSet = $('.field-set').first().clone(); // Clone the first field set
        const newIndex = $('.field-set').length; // Incrementing index

        // Update IDs and labels in the new field set
        fieldSet.find('input, select').each(function () {
            const oldId = $(this).attr('id');
            const newId = `${oldId}${newIndex}`; // Append the new index to the ID
            $(this).attr('id', newId);

            // Update the corresponding label's "for" attribute
            const label = fieldSet.find(`label[for="${oldId}"]`);
            if (label.length) {
                label.attr('for', newId);
            }
        });

        // Clear input and select values
        fieldSet.find('.femp').val('');
        // fieldSet.find('select').prop('selectedIndex', 0); // Reset select box

        // Append the new field set to the container
        $('#form-container').append(fieldSet);
    });

    $('#form-container').on('click', '.remove-field', function () {
        if ($('.field-set').length > 1) { // Ensure at least one set remains
            $(this).closest('.field-set').remove();
        } else {
            alert('At least one set of fields is required.');
        }
    });
});
</script>
