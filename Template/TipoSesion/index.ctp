<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 4/1/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoSesion[]|\Cake\Collection\CollectionInterface $tipoSesion
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nuevo Tipo de Sesión'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoSesion index large-9 medium-8 columns content">
    <h3><?= __('Tipo Sesion') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_sesion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sesion') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoSesion as $tipoSesion): ?>
            <tr>
                <td><?= $this->Number->format($tipoSesion->id_sesion) ?></td>
                <td><?= h($tipoSesion->sesion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoSesion->id_sesion]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoSesion->id_sesion]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoSesion->id_sesion], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoSesion->id_sesion)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
