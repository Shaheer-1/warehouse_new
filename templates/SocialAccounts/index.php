<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SocialAccount[]|\Cake\Collection\CollectionInterface $socialAccounts
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Social Account'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('provider') ?></th>
        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
        <th scope="col"><?= $this->Paginator->sort('reference') ?></th>
        <th scope="col"><?= $this->Paginator->sort('link') ?></th>
        <th scope="col"><?= $this->Paginator->sort('token_secret') ?></th>
        <th scope="col"><?= $this->Paginator->sort('token_expires') ?></th>
        <th scope="col"><?= $this->Paginator->sort('active') ?></th>
        <th scope="col"><?= $this->Paginator->sort('created') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($socialAccounts as $socialAccount) : ?>
        <tr>
            <td><?= h($socialAccount->id) ?></td>
            <td><?= $socialAccount->hasValue('user') ? $this->Html->link($socialAccount->user->username, ['controller' => 'Users', 'action' => 'view', $socialAccount->user->id]) : '' ?></td>
            <td><?= h($socialAccount->provider) ?></td>
            <td><?= h($socialAccount->username) ?></td>
            <td><?= h($socialAccount->reference) ?></td>
            <td><?= h($socialAccount->link) ?></td>
            <td><?= h($socialAccount->token_secret) ?></td>
            <td><?= h($socialAccount->token_expires) ?></td>
            <td><?= h($socialAccount->active) ?></td>
            <td><?= h($socialAccount->created) ?></td>
            <td><?= h($socialAccount->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $socialAccount->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $socialAccount->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $socialAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $socialAccount->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('«', ['label' => __('First')]) ?>
        <?= $this->Paginator->prev('‹', ['label' => __('Previous')]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›', ['label' => __('Next')]) ?>
        <?= $this->Paginator->last('»', ['label' => __('Last')]) ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
