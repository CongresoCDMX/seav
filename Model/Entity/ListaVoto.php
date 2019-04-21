<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ListaVoto Entity
 *
 * @property int $id_lista
 * @property int $id_propuesta
 * @property int $id_diputado
 * @property int $id_tipo
 */
class ListaVoto extends Entity
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
        'id_propuesta' => true,
        'id_diputado' => true,
        'id_tipo' => true
    ];
}
