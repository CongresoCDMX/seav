<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asistencium $asistencium
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $asistencium->id_asistencia],
                ['confirm' => __('Are you sure you want to delete # {0}?', $asistencium->id_asistencia)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Asistencia'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="asistencia form large-9 medium-8 columns content">
    <?= $this->Form->create($asistencium) ?>
    <fieldset>
        <legend><?= __('Edit Asistencium') ?></legend>
        <?php
            echo $this->Form->control('id_diputado');
            echo $this->Form->control('fecha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
