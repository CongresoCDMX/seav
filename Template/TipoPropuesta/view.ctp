<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 4/1/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoPropuestum $tipoPropuestum
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Propuestum'), ['action' => 'edit', $tipoPropuestum->id_tipo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Propuestum'), ['action' => 'delete', $tipoPropuestum->id_tipo], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoPropuestum->id_tipo)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Propuesta'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Propuestum'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoPropuesta view large-9 medium-8 columns content">
    <h3><?= h($tipoPropuestum->id_tipo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($tipoPropuestum->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Tipo') ?></th>
            <td><?= $this->Number->format($tipoPropuestum->id_tipo) ?></td>
        </tr>
    </table>
</div>
