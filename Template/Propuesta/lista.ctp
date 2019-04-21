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
<div class="propuesta index large-12 medium-12 columns content">
    <h3><?= __('Propuestas') ?></h3>
    <table cellpadding="0" cellspacing="0" id="tablePropuesta">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_tipo',['label'=>'Tipo de Propuesta']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo_propuesta',['label'=>'Propuesta']) ?></th>
		<th scope="col"><?= $this->Paginator->sort('id_diputado',['label'=>'Diputado']) ?></th>
		<th scope="col"><?= $this->Paginator->sort('Cerrar Votación') ?> </th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($propuesta as $propuestum): ?>
            <tr>
                <td><?= h($propuestum['nom_tipo']) ?></td>
                <td><?= h($propuestum['titulo_propuesta']) ?></td>
		<td><?= h($propuestum['nom_diputado']) ?></td>
		<!-- <td><?php echo $this->Form->checkbox('cerrar', ['hiddenField' => false]); ?></th>  -->
     	       <th> <input type="checkbox" name="cerrar" id="cerrar" data-id-propuesta="<?= $propuestum['id_propuesta'] ?>"></th>
                <td class="actions">
                    <?= $this->Html->link(__('Votos'), ['controller'=>'lista-voto','action' => 'index', $propuestum['id_propuesta']]) ?>
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

<script>
    $(document).ready(function(){
        console.log('Ya estoy JQuery');
        $('#tablePropuesta input[type="checkbox"]').each(function (index, element) { //index: N. objetos dentro del table, element: objeto que se esta buscando
            console.log("Row ..........");
            $(element).on('click', function () {
             console.log("Seleccionado");
             var button = $(this);
             var idProp = button.attr('data-id-propuesta');
             console.log('Propuesta ' + idProp);
             $(event.currentTarget).find('input[id="cerrar"]').attr('data-id', idProp);

               //var id = $(this).attr('data-id');
                    console.log('Actualizar ' + idProp);
                    $.ajax({
                        //method: "post",
                        url: '/seav/propuesta/cerrar/' + idProp,
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

