<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zutaten[]|\Cake\Collection\CollectionInterface $zutaten
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Zutaten'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('preis') ?></th>
        <th scope="col"><?= $this->Paginator->sort('menge') ?></th>
        <th scope="col"><?= $this->Paginator->sort('einheit') ?></th>
        <th scope="col"><?= $this->Paginator->sort('alkoholgehalt') ?></th>
        <th scope="col"><?= $this->Paginator->sort('beschreibung') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($zutaten as $zutaten) : ?>
        <tr>
            <td><?= $this->Number->format($zutaten->id) ?></td>
            <td><?= h($zutaten->name) ?></td>
            <td><?= $this->Number->format($zutaten->preis) ?></td>
            <td><?= $this->Number->format($zutaten->menge) ?></td>
            <td><?= h($zutaten->einheit) ?></td>
            <td><?= $this->Number->format($zutaten->alkoholgehalt) ?></td>
            <td><?= h($zutaten->beschreibung) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $zutaten->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zutaten->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zutaten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zutaten->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('First')) ?>
        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('Next') . ' >') ?>
        <?= $this->Paginator->last(__('Last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
