<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenDium $ordenDium
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Orden Dia'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ordenDia form large-9 medium-8 columns content">
    <?= $this->Form->create($ordenDium) ?>
    <fieldset>
        <legend><?= __('Add Orden Dium') ?></legend>
        <?php
            echo $this->Form->control('fecha_sesion');
            echo $this->Form->control('id_sesion',['type' => 'select',
                           		    		      'options' => $options,
                           						  'empty' => 'selecciona']);
            echo $this->Form->control('fecha_creacion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
