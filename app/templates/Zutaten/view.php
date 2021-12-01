<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zutaten $zutaten
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Zutaten'), ['action' => 'edit', $zutaten->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Zutaten'), ['action' => 'delete', $zutaten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zutaten->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Zutaten'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Zutaten'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Rezepte'), ['controller' => 'Rezepte', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Rezepte'), ['controller' => 'Rezepte', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="zutaten view large-9 medium-8 columns content">
    <h3><?= h($zutaten->name) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Name') ?></th>
                <td><?= h($zutaten->name) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Einheit') ?></th>
                <td><?= h($zutaten->einheit) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Beschreibung') ?></th>
                <td><?= h($zutaten->beschreibung) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($zutaten->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Preis') ?></th>
                <td><?= $this->Number->format($zutaten->preis) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Menge') ?></th>
                <td><?= $this->Number->format($zutaten->menge) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Alkoholgehalt') ?></th>
                <td><?= $this->Number->format($zutaten->alkoholgehalt) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Rezepte') ?></h4>
        <?php if (!empty($zutaten->rezepte)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Beschreibung') ?></th>
                    <th scope="col"><?= __('Anleitung') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($zutaten->rezepte as $rezepte): ?>
                <tr>
                    <td><?= h($rezepte->id) ?></td>
                    <td><?= h($rezepte->name) ?></td>
                    <td><?= h($rezepte->beschreibung) ?></td>
                    <td><?= h($rezepte->anleitung) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Rezepte', 'action' => 'view', $rezepte->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Rezepte', 'action' => 'edit', $rezepte->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Rezepte', 'action' => 'delete', $rezepte->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rezepte->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
