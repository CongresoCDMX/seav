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
 * TipoVoto Model
 *
 * @method \App\Model\Entity\TipoVoto get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoVoto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoVoto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoVoto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoVoto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoVoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoVoto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoVoto findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoVotoTable extends Table
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

        $this->setTable('tipo_voto');
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
            ->requirePresence('descripcion', 'create')
            ->allowEmptyString('descripcion', false);

        return $validator;
    }
}
