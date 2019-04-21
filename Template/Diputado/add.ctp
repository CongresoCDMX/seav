<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diputado $diputado
 */
?>
<?= $this->Html->script('upload3') ?>
<?= $this->Html->script('ShowImagePreview') ?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Lista de Diputados'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="diputado form large-9 medium-8 columns content">
    <?= $this->Form->create($diputado, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Agregar Diputado') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('id_genero',['type' => 'select',
               		    		      'options' => $genero,
            						  'empty' => 'selecciona']);
            echo $this->Form->control('id_partido', ['type' => 'select',
	                              'options' => $options,
				                  'empty' => 'selecciona']);
			echo $this->Form->control('imagen', ['type' => 'file']);


        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
