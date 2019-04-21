<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Genero $genero
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Genero'), ['action' => 'edit', $genero->id_genero]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Genero'), ['action' => 'delete', $genero->id_genero], ['confirm' => __('Are you sure you want to delete # {0}?', $genero->id_genero)]) ?> </li>
        <li><?= $this->Html->link(__('List Genero'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Genero'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="genero view large-9 medium-8 columns content">
    <h3><?= h($genero->id_genero) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Genero') ?></th>
            <td><?= h($genero->genero) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id Genero') ?></th>
            <td><?= $this->Number->format($genero->id_genero) ?></td>
        </tr>
    </table>
</div>
