<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FailedPasswordAttempt $failedPasswordAttempt
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Failed Password Attempt'), ['action' => 'edit', $failedPasswordAttempt->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Failed Password Attempt'), ['action' => 'delete', $failedPasswordAttempt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $failedPasswordAttempt->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Failed Password Attempts'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Failed Password Attempt'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="failedPasswordAttempts view large-9 medium-8 columns content">
    <h3><?= h($failedPasswordAttempt->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($failedPasswordAttempt->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $failedPasswordAttempt->hasValue('user') ? $this->Html->link($failedPasswordAttempt->user->username, ['controller' => 'Users', 'action' => 'view', $failedPasswordAttempt->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($failedPasswordAttempt->created) ?></td>
            </tr>
        </table>
    </div>
</div>
