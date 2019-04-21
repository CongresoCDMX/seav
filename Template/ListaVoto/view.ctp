<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListaVoto $listaVoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lista Voto'), ['action' => 'edit', $listaVoto->id_lista]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lista Voto'), ['action' => 'delete', $listaVoto->id_lista], ['confirm' => __('Are you sure you want to delete # {0}?', $listaVoto->id_lista)]) ?> </li>
        <li><?= $this->Html->link(__('List Lista Voto'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lista Voto'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listaVoto view large-9 medium-8 columns content">
    <h3><?= h($listaVoto->id_lista) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Lista') ?></th>
            <td><?= $this->Number->format($listaVoto->id_lista) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Propuesta') ?></th>
            <td><?= $this->Number->format($listaVoto->id_propuesta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Diputado') ?></th>
            <td><?= $this->Number->format($listaVoto->id_diputado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Tipo') ?></th>
            <td><?= $this->Number->format($listaVoto->id_tipo) ?></td>
        </tr>
    </table>
</div>
