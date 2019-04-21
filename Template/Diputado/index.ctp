<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Diputado[]|\Cake\Collection\CollectionInterface $diputado
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nuevo Diputado'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="diputado index large-9 medium-8 columns content">
    <h3><?= __('Diputado') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_partido', ['label'=>'Grupo Parlamentario']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_genero',['label'=>'Genero']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($diputado as $diputado): ?>
            <tr>
                <td><?= h($diputado['nombre']) ?></td>
                <td><?= h($diputado['nom_partido']) ?></td>
                <td><?= h($diputado['nom_genero']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $diputado['id_diputado']]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'Edit', $diputado['id_diputado']]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $diputado['id_diputado']], ['confirm' => __('Are you sure you want to delete # {0}?', $diputado['id_diputado'])]) ?>
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
