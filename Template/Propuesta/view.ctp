<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/29/19.
dante.cuevas@congresociudaddemexico.gob.mx
**/
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Propuestum $propuestum
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="propuesta view large-12 medium-12 columns content">
    <h3>Tiempo restante: </h3><h3 class="countdown"></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Fecha de la Sesión') ?></th>
            <td><?= h($propuestum['fech_sesion']) ?></td>
        </tr>
        
        <tr>
            <th scope="row"><?= __('Tipo de Propuesta') ?></th>
            <td><?= h($propuestum['nom_tipo']) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre del Diputado') ?></th>
            <td><?= h($propuestum['nom_diputado']) ?></td>
        </tr>
	
        <tr>
           <th scope="row"><?= __('Grupo Parlamentario') ?></th>
            <td><?= h($propuestum['nom_partido']) ?></td>
        </tr>
    </table>
       <div>
            <h3><?= __('Propuesta') ?></h3>
          <p> <?= h($propuestum['titulo_propuesta']) ?></p>
        </div>


</div>

<div class="propuesta view large-12 medium-12 columns content footer">
<label>Definir contador: </label>
<input type="text" id="myText" style="width: 100px; " placeholder="00:00">
<button onclick="myFunction()">Iniciar</button>
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
   color: white;
}
</style>

<script>
function myFunction() {
var time = document.getElementById("myText").value;
	console.log(time);


var timer2 = time;
var interval = setInterval(function() {


  var timer = timer2.split(':');
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = (seconds < 0) ? --minutes : minutes;
  if (minutes < 0) clearInterval(interval);
  seconds = (seconds < 0) ? 59 : seconds;
  seconds = (seconds < 10) ? '0' + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  $('.countdown').html(minutes + ':' + seconds);
  timer2 = minutes + ':' + seconds;
}, 1000);}
</script>
