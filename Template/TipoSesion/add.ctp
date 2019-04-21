<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 4/1/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoSesion $tipoSesion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Tipo Sesion'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="tipoSesion form large-9 medium-8 columns content">
    <?= $this->Form->create($tipoSesion) ?>
    <fieldset>
        <legend><?= __('Agregar Tipo de Sesion') ?></legend>
        <?php
            echo $this->Form->control('sesion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
