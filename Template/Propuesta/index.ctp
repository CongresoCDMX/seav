<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propuestum[]|\Cake\Collection\CollectionInterface $propuesta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Propuesta'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="propuesta index large-9 medium-8 columns content">
    <h3><?= __('Propuesta') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_tipo',['label'=>'Tipo de Propuesta']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_propuesta',['label'=>'Propuesta']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_diputado',['label'=>'Diputado']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propuesta as $propuestum): ?>
            <tr>
                <td><?= h($propuestum['nom_tipo']) ?></td>
                <td><?= h($propuestum['titulo_propuesta']) ?></td>
                <td><?= h($propuestum['nom_diputado']) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Votos'), ['controller'=>'lista-voto','action' => 'index']) ?>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $propuestum['id_propuesta']]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $propuestum['id_propuesta']]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $propuestum['id_propuesta']], ['confirm' => __('Are you sure you want to delete # {0}?', $propuestum['id_propuesta'])]) ?>
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
