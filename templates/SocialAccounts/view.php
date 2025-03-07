<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialAccount $socialAccount
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Social Account'), ['action' => 'edit', $socialAccount->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Social Account'), ['action' => 'delete', $socialAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialAccount->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Social Accounts'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Social Account'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="socialAccounts view large-9 medium-8 columns content">
    <h3><?= h($socialAccount->provider) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($socialAccount->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('User') ?></th>
                <td><?= $socialAccount->hasValue('user') ? $this->Html->link($socialAccount->user->username, ['controller' => 'Users', 'action' => 'view', $socialAccount->user->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Provider') ?></th>
                <td><?= h($socialAccount->provider) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Username') ?></th>
                <td><?= h($socialAccount->username) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Reference') ?></th>
                <td><?= h($socialAccount->reference) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Link') ?></th>
                <td><?= h($socialAccount->link) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Token Secret') ?></th>
                <td><?= h($socialAccount->token_secret) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Token Expires') ?></th>
                <td><?= h($socialAccount->token_expires) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($socialAccount->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($socialAccount->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Active') ?></th>
                <td><?= $socialAccount->active ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>
    <div class="text">
        <h4><?= __('Avatar') ?></h4>
        <?= $this->Text->autoParagraph(h($socialAccount->avatar)); ?>
    </div>
    <div class="text">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($socialAccount->description)); ?>
    </div>
    <div class="text">
        <h4><?= __('Data') ?></h4>
        <?= $this->Text->autoParagraph(h($socialAccount->data)); ?>
    </div>
</div>
