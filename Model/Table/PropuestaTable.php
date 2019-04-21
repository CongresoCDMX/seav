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
 * Propuesta Model
 *
 * @method \App\Model\Entity\Propuestum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Propuestum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Propuestum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Propuestum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propuestum|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Propuestum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Propuestum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Propuestum findOrCreate($search, callable $callback = null, $options = [])
 */
class PropuestaTable extends Table
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

        $this->setTable('propuesta');
        $this->setDisplayField('id_propuesta');
        $this->setPrimaryKey('id_propuesta');
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
            ->integer('id_propuesta')
            ->allowEmptyString('id_propuesta', 'create');

        $validator
            ->integer('id_orden')
            ->allowEmptyString('id_orden');

        $validator
            ->integer('id_tipo')
            ->allowEmptyString('id_tipo');

        $validator
            ->integer('no_orden')
            ->allowEmptyString('no_orden');

        $validator
            ->scalar('titulo_propuesta')
            ->requirePresence('titulo_propuesta', 'create')
            ->allowEmptyString('titulo_propuesta', false);

        $validator
            ->integer('id_diputado')
            ->allowEmptyString('id_diputado');

        $validator
            ->boolean('cerrar')
            ->allowEmptyString('cerrar');

        return $validator;
    }
}
