<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rezepte $rezepte
 * @var \App\Model\Entity\Mengen[]|\Cake\Collection\CollectionInterface $mengen
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $rezepte->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rezepte->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Rezepte'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="rezepte form content">
    <?= $this->Form->create($rezepte) ?>
    <fieldset>
        <legend><?= __('Edit Rezepte') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('beschreibung');
            echo $this->Form->control('anleitung');
            echo $this->Form->control('mengen_id', ['options' => $mengen]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
