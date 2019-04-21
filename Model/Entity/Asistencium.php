<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asistencium Entity
 *
 * @property int $id_asistencia
 * @property int|null $id_orden
 * @property int $id_diputado
 * @property \Cake\I18n\FrozenTime $fecha
 */
class Asistencium extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_orden' => true,
        'id_diputado' => true,
        'fecha' => true
    ];
}
