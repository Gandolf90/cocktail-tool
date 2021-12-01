<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rezepte[]|\Cake\Collection\CollectionInterface $rezepte
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Rezepte'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('beschreibung') ?></th>
        <th scope="col"><?= $this->Paginator->sort('anleitung') ?></th>
        <th scope="col"><?= $this->Paginator->sort('mengen_id') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($rezepte as $rezepte) : ?>
        <tr>
            <td><?= $this->Number->format($rezepte->id) ?></td>
            <td><?= h($rezepte->name) ?></td>
            <td><?= h($rezepte->beschreibung) ?></td>
            <td><?= h($rezepte->anleitung) ?></td>
            <td><?= $rezepte->has('mengen') ? $this->Html->link($rezepte->mengen->id, ['controller' => 'Mengen', 'action' => 'view', $rezepte->mengen->id]) : '' ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $rezepte->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $rezepte->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rezepte->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rezepte->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
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
