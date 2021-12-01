<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rezepte $rezepte
 * @var \App\Model\Entity\Zutaten[]|\Cake\Collection\CollectionInterface $zutaten
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Rezepte'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Zutaten'), ['controller' => 'Zutaten', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Zutaten'), ['controller' => 'Zutaten', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="rezepte form content">
    <?= $this->Form->create($rezepte) ?>
    <fieldset>
        <legend><?= __('Add Rezepte') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('beschreibung');
            echo $this->Form->control('anleitung');
            echo $this->Form->control('zutaten._ids', ['options' => $zutaten]);
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
