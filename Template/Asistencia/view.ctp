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
        <li><?= $this->Html->link(__('Edit Asistencium'), ['action' => 'edit', $asistencium->id_asistencia]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Asistencium'), ['action' => 'delete', $asistencium->id_asistencia], ['confirm' => __('Are you sure you want to delete # {0}?', $asistencium->id_asistencia)]) ?> </li>
        <li><?= $this->Html->link(__('List Asistencia'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Asistencium'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="asistencia view large-9 medium-8 columns content">
    <h3><?= h($asistencium->id_asistencia) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Asistencia') ?></th>
            <td><?= $this->Number->format($asistencium->id_asistencia) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Diputado') ?></th>
            <td><?= $this->Number->format($asistencium->id_diputado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($asistencium->fecha) ?></td>
        </tr>
    </table>
</div>
