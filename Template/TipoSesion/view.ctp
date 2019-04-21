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
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tipo Sesion'), ['action' => 'edit', $tipoSesion->id_sesion]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tipo Sesion'), ['action' => 'delete', $tipoSesion->id_sesion], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoSesion->id_sesion)]) ?> </li>
        <li><?= $this->Html->link(__('List Tipo Sesion'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tipo Sesion'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tipoSesion view large-9 medium-8 columns content">
    <h3><?= h($tipoSesion->id_sesion) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sesion') ?></th>
            <td><?= h($tipoSesion->sesion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Sesion') ?></th>
            <td><?= $this->Number->format($tipoSesion->id_sesion) ?></td>
        </tr>
    </table>
</div>
