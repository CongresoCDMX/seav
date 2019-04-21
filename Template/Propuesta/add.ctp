<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propuestum $propuestum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Orden del Día'), ['controller'=>'OrdenDia', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="propuesta form large-9 medium-8 columns content">
    <?= $this->Form->create($propuestum) ?>
    <fieldset>
        <legend><?= __('Agregar Propuesta') ?></legend>
        <?php
            echo $this->Form->control('id_orden', ['type'=>'hidden', 'value'=>$orden->id_orden]);
            echo $this->Form->control('id_tipo',['type' => 'select',
               		    		      'options' => $tipo,
               						  'empty' => 'selecciona']);
            echo $this->Form->control('no_propuesta');
            echo $this->Form->control('titulo_propuesta');
            echo $this->Form->control('id_diputado',['type' => 'select',
               		    		      'options' => $options,
               						  'empty' => 'selecciona']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
