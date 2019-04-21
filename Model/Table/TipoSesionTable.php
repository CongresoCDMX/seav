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
 * TipoSesion Model
 *
 * @method \App\Model\Entity\TipoSesion get($primaryKey, $options = [])
 * @method \App\Model\Entity\TipoSesion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TipoSesion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TipoSesion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoSesion|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TipoSesion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TipoSesion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TipoSesion findOrCreate($search, callable $callback = null, $options = [])
 */
class TipoSesionTable extends Table
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

        $this->setTable('tipo_sesion');
        $this->setDisplayField('id_sesion');
        $this->setPrimaryKey('id_sesion');
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
            ->integer('id_sesion')
            ->allowEmptyString('id_sesion', 'create');

        $validator
            ->scalar('sesion')
            ->maxLength('sesion', 45)
            ->requirePresence('sesion', 'create')
            ->allowEmptyString('sesion', false);

        return $validator;
    }
}
