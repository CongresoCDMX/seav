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
 * TipoPropuesta Model
 *
 * @method \App\Model\Entity\TipoPropuestum get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoPropuestum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoPropuestum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoPropuestum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoPropuestum|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoPropuestum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoPropuestum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoPropuestum findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoPropuestaTable extends Table
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

        $this->setTable('tipo_propuesta');
        $this->setDisplayField('id_tipo');
        $this->setPrimaryKey('id_tipo');
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
            ->integer('id_tipo')
            ->allowEmptyString('id_tipo', 'create');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 45)
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
