<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TipoAsistencium[]|\Cake\Collection\CollectionInterface $tipoAsistencia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tipo Asistencium'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tipoAsistencia index large-9 medium-8 columns content">
    <h3><?= __('Tipo Asistencia') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_tipo_asistencia') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asistencia_tipo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tipoAsistencia as $tipoAsistencium): ?>
            <tr>
                <td><?= $this->Number->format($tipoAsistencium->id_tipo_asistencia) ?></td>
                <td><?= h($tipoAsistencium->asistencia_tipo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tipoAsistencium->id_tipo_asistencia]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tipoAsistencium->id_tipo_asistencia]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tipoAsistencium->id_tipo_asistencia], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoAsistencium->id_tipo_asistencia)]) ?>
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
