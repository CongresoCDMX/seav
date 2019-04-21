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
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $propuestum->id_propuesta],
                ['confirm' => __('Estas seguro de eliminar la propuesta # {0}?', $propuestum->id_propuesta)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Lista de Propuestas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="propuesta form large-9 medium-8 columns content">
    <?= $this->Form->create($propuestum) ?>
    <fieldset>
        <legend><?= __('Editar Propuesta') ?></legend>
        <?php
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
