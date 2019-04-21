<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partido $partido
 */
?>
<?= $this->Html->script('upload3') ?>
<?= $this->Html->script('ShowImagePreview') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Partido'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="partido form large-9 medium-8 columns content">
    <?= $this->Form->create($partido, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Partido') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('foto', ['type' => 'file']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
