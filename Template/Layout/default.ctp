<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'SEAV Congreso';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>


    <?= $this->Html->script('jquery.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
		<li><li class="nav-link"><?= $this->Html->link('Pantallas',['controller' => 'Lista-voto', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Usuarios',['controller' => 'Users', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Diputados',['controller' => 'Diputado', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Partido',['controller' => 'Partido', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Orden del Día',['controller' => 'Orden-dia', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Tipo de Propuesta',['controller' => 'Tipo-propuesta', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Genero',['controller' => 'Genero', 'action' => 'index'])?></li></li>
                <li><li class="nav-link"><?= $this->Html->link('Salir',['controller' => 'Users', 'action' => 'logout'])?></li></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
