<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rezepte $rezepte
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Rezepte'), ['action' => 'edit', $rezepte->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Rezepte'), ['action' => 'delete', $rezepte->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rezepte->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rezepte'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Rezepte'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="rezepte view large-9 medium-8 columns content">
    <h3><?= h($rezepte->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($rezepte->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Beschreibung') ?></th>
                <td><?= h($rezepte->beschreibung) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Anleitung') ?></th>
                <td><?= h($rezepte->anleitung) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($rezepte->id) ?></td>
            </tr>
        </table>
    </div>
</div>
