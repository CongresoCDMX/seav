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
        <li><?= $this->Html->link(__('Pantalla Derecha'), ['action' => 'listaDerecha']) ?></li>
        <li><?= $this->Html->link(__('Pantalla Izquierda'), ['action' => 'listaIzquierda']) ?></li>
    </ul>
</nav>
<div class="listaVoto index large-9 medium-8 columns content">
    <h3><?= __('Lista de Votos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_lista') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_propuesta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_diputado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_tipo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaVoto as $listaVoto): ?>
            <tr>
                <td><?= $this->Number->format($listaVoto->id_lista) ?></td>
                <td><?= $this->Number->format($listaVoto->id_propuesta) ?></td>
                <td><?= $this->Number->format($listaVoto->id_diputado) ?></td>
                <td><?= $this->Number->format($listaVoto->id_tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $listaVoto->id_lista]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $listaVoto->id_lista]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $listaVoto->id_lista], ['confirm' => __('Are you sure you want to delete # {0}?', $listaVoto->id_lista)]) ?>
                </td>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>


<div class="propuesta view large-12 medium-12 columns content footer">
<label>A favor: </label>
</div>


<style>
h3{
font-size: 55px;
}
td, th, p {
  font-size:45px !important;
  margin-bottom: 10px;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
}
</style>