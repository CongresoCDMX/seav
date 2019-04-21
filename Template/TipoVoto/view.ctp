<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 4/1/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoVoto $tipoVoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Voto'), ['action' => 'edit', $tipoVoto->id_tipo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Voto'), ['action' => 'delete', $tipoVoto->id_tipo], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoVoto->id_tipo)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Voto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Voto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoVoto view large-9 medium-8 columns content">
    <h3><?= h($tipoVoto->id_tipo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($tipoVoto->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Tipo') ?></th>
            <td><?= $this->Number->format($tipoVoto->id_tipo) ?></td>
        </tr>
    </table>
</div>
