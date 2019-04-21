<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListaVoto[]|\Cake\Collection\CollectionInterface $listaVoto
 */
?>

<div class="listaVoto index large-12 medium-12 columns content">
    <h3>Propuesta: </h3>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id_diputado', ['label'=>'Diputado']) ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_tipo',['label'=>'Voto']) ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $lista): ?>
            <tr>
		<td><?= h($lista['nom_diputado']) ?></td>
                <td><?= h($lista['nom_tipo']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  <!--  <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('ultimo') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div> -->
</div>


<div class="propuesta view large-12 medium-12 columns content footer">
<ul>
<li>A Favor:<?= $favor ?></li>
<li>En Contra:<?= $en_contra ?></li>
<li>Abstención:<?= $abstencion ?></li>
<ul>
</div>


<style>
h3{
font-size: 55px;
}
td, th, p {
  font-size:45px !important;
  margin-bottom: 10px;
}

.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #e5e5e5;
  color: #828282;
  text-align: center;
  display: inline-block;
}
ul { text-align: center;
      font-size:45px !important;

}
li { display: inline-block;
  font-size:45px !important;
  margin-right: 50px;

}
</style>