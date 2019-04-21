<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoAsistencium $tipoAsistencium
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tipo Asistencia'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tipoAsistencia form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoAsistencium) ?>
    <fieldset>
        <legend><?= __('Add Tipo Asistencium') ?></legend>
        <?php
            echo $this->Form->control('asistencia_tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
