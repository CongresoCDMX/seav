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
 * ListaVoto Model
 *
 * @method \App\Model\Entity\ListaVoto get($primaryKey, $options = [])
 * @method \App\Model\Entity\ListaVoto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ListaVoto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ListaVoto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListaVoto|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ListaVoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ListaVoto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ListaVoto findOrCreate($search, callable $callback = null, $options = [])
 */
class ListaVotoTable extends Table
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

        $this->setTable('lista_voto');
        $this->setDisplayField('id_lista');
        $this->setPrimaryKey('id_lista');
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
            ->integer('id_lista')
            ->allowEmptyString('id_lista', 'create');

        $validator
            ->integer('id_propuesta')
            ->requirePresence('id_propuesta', 'create')
            ->allowEmptyString('id_propuesta', false);

        $validator
            ->integer('id_diputado')
            ->requirePresence('id_diputado', 'create')
            ->allowEmptyString('id_diputado', false);

        $validator
            ->integer('id_tipo')
            ->requirePresence('id_tipo', 'create')
            ->allowEmptyString('id_tipo', false);

        return $validator;
    }
}
