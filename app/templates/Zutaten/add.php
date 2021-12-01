<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Zutaten $zutaten
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Zutaten'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="zutaten form content">
    <?= $this->Form->create($zutaten) ?>
    <fieldset>
        <legend><?= __('Add Zutaten') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('preis');
            echo $this->Form->control('menge');
            echo $this->Form->control('einheit');
            echo $this->Form->control('alkoholgehalt');
            echo $this->Form->control('beschreibung');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
