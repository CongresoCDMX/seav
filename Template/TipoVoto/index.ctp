<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 4/1/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoVoto[]|\Cake\Collection\CollectionInterface $tipoVoto
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipo Voto'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoVoto index large-9 medium-8 columns content">
    <h3><?= __('Tipo Voto') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoVoto as $tipoVoto): ?>
            <tr>
                <td><?= $this->Number->format($tipoVoto->id_tipo) ?></td>
                <td><?= h($tipoVoto->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoVoto->id_tipo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoVoto->id_tipo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoVoto->id_tipo], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoVoto->id_tipo)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')]) ?></p>
    </div>
</div>
