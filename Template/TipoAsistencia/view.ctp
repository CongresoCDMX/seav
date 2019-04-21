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
        <li><?= $this->Html->link(__('Edit Tipo Asistencium'), ['action' => 'edit', $tipoAsistencium->id_tipo_asistencia]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Asistencium'), ['action' => 'delete', $tipoAsistencium->id_tipo_asistencia], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoAsistencium->id_tipo_asistencia)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Asistencia'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Asistencium'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoAsistencia view large-9 medium-8 columns content">
    <h3><?= h($tipoAsistencium->id_tipo_asistencia) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Asistencia Tipo') ?></th>
            <td><?= h($tipoAsistencium->asistencia_tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Tipo Asistencia') ?></th>
            <td><?= $this->Number->format($tipoAsistencium->id_tipo_asistencia) ?></td>
        </tr>
    </table>
</div>
