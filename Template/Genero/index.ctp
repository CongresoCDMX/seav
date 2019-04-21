<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genero[]|\Cake\Collection\CollectionInterface $genero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Genero'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="genero index large-9 medium-8 columns content">
    <h3><?= __('Genero') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_genero') ?></th>
                <th scope="col"><?= $this->Paginator->sort('genero') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($genero as $genero): ?>
            <tr>
                <td><?= $this->Number->format($genero->id_genero) ?></td>
                <td><?= h($genero->genero) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $genero->id_genero]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $genero->id_genero]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $genero->id_genero], ['confirm' => __('Are you sure you want to delete # {0}?', $genero->id_genero)]) ?>
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
