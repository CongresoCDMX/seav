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
        <li><?= $this->Html->link(__('Edit Orden Dium'), ['action' => 'edit', $ordenDium->id_orden]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Orden Dium'), ['action' => 'delete', $ordenDium->id_orden], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenDium->id_orden)]) ?> </li>
        <li><?= $this->Html->link(__('List Orden Dia'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Orden Dium'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ordenDia view large-9 medium-8 columns content">
    <h3><?= h($ordenDium->id_orden) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Orden') ?></th>
            <td><?= $this->Number->format($ordenDium->id_orden) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Sesion') ?></th>
            <td><?= h($ordenDium->fecha_sesion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Creacion') ?></th>
            <td><?= h($ordenDium->fecha_creacion) ?></td>
        </tr>
    </table>
</div>
