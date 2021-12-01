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
<li><?= $this->Html->link(__('List Zutaten'), ['controller' => 'Zutaten', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Zutaten'), ['controller' => 'Zutaten', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
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
    <div class="related">
        <h4><?= __('Related Zutaten') ?></h4>
        <?php if (!empty($rezepte->zutaten)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Preis') ?></th>
                    <th scope="col"><?= __('Menge') ?></th>
                    <th scope="col"><?= __('Einheit') ?></th>
                    <th scope="col"><?= __('Alkoholgehalt') ?></th>
                    <th scope="col"><?= __('Beschreibung') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($rezepte->zutaten as $zutaten): ?>
                <tr>
                    <td><?= h($zutaten->id) ?></td>
                    <td><?= h($zutaten->name) ?></td>
                    <td><?= h($zutaten->preis) ?></td>
                    <td><?= h($zutaten->menge) ?></td>
                    <td><?= h($zutaten->einheit) ?></td>
                    <td><?= h($zutaten->alkoholgehalt) ?></td>
                    <td><?= h($zutaten->beschreibung) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Zutaten', 'action' => 'view', $zutaten->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Zutaten', 'action' => 'edit', $zutaten->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Zutaten', 'action' => 'delete', $zutaten->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zutaten->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
