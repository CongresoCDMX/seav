<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asistencium[]|\Cake\Collection\CollectionInterface $asistencia
 */
?>
<div class="asistencia index large-12 medium-12 columns content">
    <h3><?= __('Asistencia') ?></h3>
    <table cellpadding="0" cellspacing="0" id="tableAsistencia">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_diputado', ['label'=>'Diputado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
             </tr>
        </thead>
        <tbody>
            <?php foreach ($asistencia as $asistencium): ?>
            <tr>
                <td><?= h($asistencium['nom_diputado']) ?></td>
                <td><?= h($asistencium['fecha']) ?></td>
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
