<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdenDia Model
 *
 * @method \App\Model\Entity\OrdenDium get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdenDium newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdenDium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDium|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenDium|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenDium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDium[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenDium findOrCreate($search, callable $callback = null, $options = [])
 */
class OrdenDiaTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('orden_dia');
        $this->setDisplayField('id_orden');
        $this->setPrimaryKey('id_orden');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_orden')
            ->allowEmptyString('id_orden', 'create');

        $validator
            ->date('fecha_sesion')
            ->requirePresence('fecha_sesion', 'create')
            ->allowEmptyDate('fecha_sesion', false);

        $validator
            ->integer('id_sesion')
            ->allowEmptyString('id_sesion');

        $validator
            ->dateTime('fecha_creacion')
            ->requirePresence('fecha_creacion', 'create')
            ->allowEmptyDateTime('fecha_creacion', false);

        return $validator;
    }
}
