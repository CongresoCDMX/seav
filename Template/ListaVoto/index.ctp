<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListaVoto[]|\Cake\Collection\CollectionInterface $listaVoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Agregar a la Lista de Voto'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Pantalla Derecha'), ['action' =>'listaDerecha','id'=>$propuesta['id_propuesta']]) ?></li>
        <li><?= $this->Html->link(__('Pantalla Izquierda'), ['action' => 'listaIzquierda','id'=>$propuesta['id_propuesta']]) ?></li>
    </ul>
</nav>
<div class="listaVoto index large-9 medium-8 columns content">
    <h3><?= __('Lista de Votos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_propuesta', ['label'=>'Propuesta']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_diputado', ['label'=>'Diputado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_tipo', ['label'=>'Voto']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $lista): ?>
            <tr>
                <td><?= h($lista['nom_propuesta']) ?></td>
                <td><?= h($lista['nom_diputado']) ?></td>
                <td><?= h($lista['nom_tipo']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>
