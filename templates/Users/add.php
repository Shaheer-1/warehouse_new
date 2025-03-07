<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\FailedPasswordAttempt[]|\Cake\Collection\CollectionInterface $failedPasswordAttempts
 * @var \App\Model\Entity\SocialAccount[]|\Cake\Collection\CollectionInterface $socialAccounts
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Failed Password Attempts'), ['controller' => 'FailedPasswordAttempts', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Failed Password Attempt'), ['controller' => 'FailedPasswordAttempts', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Social Accounts'), ['controller' => 'SocialAccounts', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Social Account'), ['controller' => 'SocialAccounts', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="users form content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('token');
            echo $this->Form->control('token_expires', ['empty' => true]);
            echo $this->Form->control('api_token');
            echo $this->Form->control('activation_date', ['empty' => true]);
            echo $this->Form->control('secret');
            echo $this->Form->control('secret_verified');
            echo $this->Form->control('tos_date', ['empty' => true]);
            echo $this->Form->control('active');
            echo $this->Form->control('is_superuser');
            echo $this->Form->control('role');
            echo $this->Form->control('additional_data');
            echo $this->Form->control('last_login', ['empty' => true]);
            echo $this->Form->control('lockout_time', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
