<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Failed Password Attempts'), ['controller' => 'FailedPasswordAttempts', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Failed Password Attempt'), ['controller' => 'FailedPasswordAttempts', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Social Accounts'), ['controller' => 'SocialAccounts', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Social Account'), ['controller' => 'SocialAccounts', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->username) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= h($user->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Username') ?></th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('First Name') ?></th>
                <td><?= h($user->first_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Last Name') ?></th>
                <td><?= h($user->last_name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Api Token') ?></th>
                <td><?= h($user->api_token) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Secret') ?></th>
                <td><?= h($user->secret) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Role') ?></th>
                <td><?= h($user->role) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Token Expires') ?></th>
                <td><?= h($user->token_expires) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Activation Date') ?></th>
                <td><?= h($user->activation_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Tos Date') ?></th>
                <td><?= h($user->tos_date) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($user->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($user->modified) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Last Login') ?></th>
                <td><?= h($user->last_login) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Lockout Time') ?></th>
                <td><?= h($user->lockout_time) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Secret Verified') ?></th>
                <td><?= $user->secret_verified ? __('Yes') : __('No'); ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Active') ?></th>
                <td><?= $user->active ? __('Yes') : __('No'); ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Is Superuser') ?></th>
                <td><?= $user->is_superuser ? __('Yes') : __('No'); ?></td>
            </tr>
        </table>
    </div>
    <div class="text">
        <h4><?= __('Additional Data') ?></h4>
        <?= $this->Text->autoParagraph(h($user->additional_data)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Failed Password Attempts') ?></h4>
        <?php if (!empty($user->failed_password_attempts)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->failed_password_attempts as $failedPasswordAttempts): ?>
                <tr>
                    <td><?= h($failedPasswordAttempts->id) ?></td>
                    <td><?= h($failedPasswordAttempts->user_id) ?></td>
                    <td><?= h($failedPasswordAttempts->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'FailedPasswordAttempts', 'action' => 'view', $failedPasswordAttempts->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'FailedPasswordAttempts', 'action' => 'edit', $failedPasswordAttempts->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'FailedPasswordAttempts', 'action' => 'delete', $failedPasswordAttempts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $failedPasswordAttempts->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Social Accounts') ?></h4>
        <?php if (!empty($user->social_accounts)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Provider') ?></th>
                    <th scope="col"><?= __('Username') ?></th>
                    <th scope="col"><?= __('Reference') ?></th>
                    <th scope="col"><?= __('Avatar') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Link') ?></th>
                    <th scope="col"><?= __('Token') ?></th>
                    <th scope="col"><?= __('Token Secret') ?></th>
                    <th scope="col"><?= __('Token Expires') ?></th>
                    <th scope="col"><?= __('Active') ?></th>
                    <th scope="col"><?= __('Data') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($user->social_accounts as $socialAccounts): ?>
                <tr>
                    <td><?= h($socialAccounts->id) ?></td>
                    <td><?= h($socialAccounts->user_id) ?></td>
                    <td><?= h($socialAccounts->provider) ?></td>
                    <td><?= h($socialAccounts->username) ?></td>
                    <td><?= h($socialAccounts->reference) ?></td>
                    <td><?= h($socialAccounts->avatar) ?></td>
                    <td><?= h($socialAccounts->description) ?></td>
                    <td><?= h($socialAccounts->link) ?></td>
                    <td><?= h($socialAccounts->token) ?></td>
                    <td><?= h($socialAccounts->token_secret) ?></td>
                    <td><?= h($socialAccounts->token_expires) ?></td>
                    <td><?= h($socialAccounts->active) ?></td>
                    <td><?= h($socialAccounts->data) ?></td>
                    <td><?= h($socialAccounts->created) ?></td>
                    <td><?= h($socialAccounts->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'SocialAccounts', 'action' => 'view', $socialAccounts->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'SocialAccounts', 'action' => 'edit', $socialAccounts->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'SocialAccounts', 'action' => 'delete', $socialAccounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialAccounts->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
