<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrdenDium[]|\Cake\Collection\CollectionInterface $ordenDia
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Orden del Día'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ordenDia index large-9 medium-8 columns content">
    <h3><?= __('Orden del Dia') ?></h3>
    <table cellpadding="0" cellspacing="0" id="tablePropuesta">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha_sesion', ['label'=>'Fecha de Sesión']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_sesion',['label'=>'Tipo de Sesión']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cerrar Asistencia',['label'=>'Cerrar Asistencia']) ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenDia as $ordenDium): ?>
            <tr>
                <td><?= h($ordenDium['fecha_sesion']) ?></td>
                <td><?= h($ordenDium['nom_sesion']) ?></td>
                 <th> <input type="checkbox" name="cerrara" id="cerrara" data-id-asistencia="<?= $asistencium['id_asistencia'] ?>"></th>

                <td class="actions">
                    <?= $this->Html->link(__('Iniciativas'), ['controller'=>'Propuesta', 'action' => 'add', $ordenDium['id_orden']]) ?>
                    <?= $this->Html->link(__('Orden Día'), ['controller'=>'Propuesta', 'action' => 'lista', $ordenDium['id_orden']]) ?>
                    <?= $this->Html->link(__('Asistencia'), ['controller'=>'Asistencia','action' => 'index', $ordenDium['id_orden']]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $ordenDium['id_orden']], ['confirm' => __('Are you sure you want to delete # {0}?', $ordenDium['id_orden'])]) ?>
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

<script>
    $(document).ready(function(){
        console.log('Ya estoy JQuery');
        $('#tableAsistencia input[type="checkbox"]').each(function (index, element) { //index: N. objetos dentro del table, element: objeto que se esta buscando
            console.log("Row ..........");
            $(element).on('click', function () {
             console.log("Seleccionado");
             var button = $(this);
             var idProp = button.attr('data-id-asistencia');
             console.log('Propuesta ' + idProp);
             $(event.currentTarget).find('input[id="cerrara"]').attr('data-id', idProp);

               //var id = $(this).attr('data-id');
                    console.log('Actualizar ' + idProp);
                    $.ajax({
                        //method: "post",
                        url: '/seav/asistencia/cerrar/' + idProp,
                        dataType: 'json',
                        success: function(msg) {
                            result = msg[0];
                            console.log(result.message);
                            if (result.result === 'ok') {
                                delete(id);
                                window.location.reload();
                            }
                        }
                    });


            });
        });
    });

</script>

</script>
