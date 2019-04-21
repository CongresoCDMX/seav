<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Propuesta Controller
 *
 * @property \App\Model\Table\PropuestaTable $Propuesta
 *
 * @method \App\Model\Entity\Propuestum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropuestaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id_orden= null)
    {
        //$propuesta = $this->paginate($this->Propuesta);
        //$this->set(compact('propuesta'));

        $propuesta = TableRegistry::get('propuesta');
        $query = $propuesta->find()
            ->select([
                'id_propuesta',
                'nom_tipo' =>'c.descripcion',
                'titulo_propuesta',
                'nom_diputado'=>'d.nombre'
                ,])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'tipo_propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_tipo = propuesta.id_tipo'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_diputado = propuesta.id_diputado'
                ]
            ])
            ->where([
                'propuesta.id_propuesta'=>$id_orden
            ]);

        $this->set('propuesta', $this->paginate($query));
        $this->set('_serialize', ['propuesta']);
    }

    /**
     * View method
     *
     * @param string|null $id Propuestum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /*$propuestum = $this->Propuesta->get($id, [
            'contain' => []
        ]);

        $this->set('propuestum', $propuestum);*/

        $this->viewBuilder()->setLayout('pantallas');


        $query = $this->Propuesta
            ->find()
            ->select([
                'id_propuesta',
                'fech_sesion'=>'f.fecha_sesion',
                'nom_tipo'=>'d.descripcion',
                'no_orden',
                'titulo_propuesta',
                'nom_diputado'=>'e.nombre',
                'nom_partido'=>'c.nombre'
            ])
            ->enableHydration(false)
            ->join([
                'd' => [
                    'table' => 'tipo_propuesta',
                    'type' => 'INNER',
                    'conditions' => 'd.id_tipo = Propuesta.id_tipo'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'e.id_diputado = Propuesta.id_diputado'
                ]
            ])
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = e.id_partido'
                ]
            ])
            ->join([
                'f' => [
                    'table' => 'orden_dia',
                    'type' => 'INNER',
                    'conditions' => 'f.id_orden = Propuesta.id_orden'
                ]
            ])
            ->where(['id_propuesta' => $id]);
        $row = $query->first();

        $this->set('propuestum', $row);
        $this->set('_serialize', ['propuestum']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id_orden= null)
    {


        $ordenTable = TableRegistry::get('Orden_dia');
        $orden = $ordenTable->get($id_orden,[
            'contain'=>[]
        ]);

        $this->loadModel('diputado');
        $options = $this->diputado->find('list', ['keyField' => 'id_diputado',
            'valueField' => 'nombre']);
        $this->set('options', $options);

        $this->loadModel('tipo_propuesta');
        $tipo = $this->tipo_propuesta->find('list', ['keyField' => 'id_tipo', 'valueField' => 'descripcion']);
        $this->set('tipo', $tipo);

        $propuestum = $this->Propuesta->newEntity();
        if ($this->request->is('post')) {
            $propuestum = $this->Propuesta->patchEntity($propuestum, $this->request->getData());
            if ($this->Propuesta->save($propuestum)) {
                $this->Flash->success(__('The propuestum has been saved.'));

                return $this->redirect(['controller'=>'OrdenDia', 'action' => 'index']);
            }
            $this->Flash->error(__('The propuestum could not be saved. Please, try again.'));
        }
        $this->set(compact('propuestum', 'orden'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Propuestum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propuestum = $this->Propuesta->get($id, [
            'contain' => []
        ]);

        $this->loadModel('tipo_propuesta');
        $tipo = $this->tipo_propuesta->find('list', ['keyField' => 'id_tipo', 'valueField' => 'descripcion']);
        $this->set('tipo', $tipo);
        
        $this->loadModel('diputado');
        $options = $this->diputado->find('list', ['keyField' => 'id_diputado',
            'valueField' => 'nombre']);
        $this->set('options', $options);

        $this->loadModel('tipo_propuesta');
        $tipo = $this->tipo_propuesta->find('list', ['keyField' => 'id_tipo', 'valueField' => 'descripcion']);
        $this->set('tipo', $tipo);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $propuestum = $this->Propuesta->patchEntity($propuestum, $this->request->getData());
            if ($this->Propuesta->save($propuestum)) {
                $this->Flash->success(__('The propuestum has been saved.'));

                return $this->redirect(['controller'=>'OrdenDia', 'action' => 'index']);
            }
            $this->Flash->error(__('The propuestum could not be saved. Please, try again.'));
        }
        $this->set(compact('propuestum'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Propuestum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propuestum = $this->Propuesta->get($id);
        if ($this->Propuesta->delete($propuestum)) {
            $this->Flash->success(__('The propuestum has been deleted.'));
        } else {
            $this->Flash->error(__('The propuestum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    
   }

    public function cerrar($id = null){
        $propuestaTable = TableRegistry::get('Propuesta');
        $propuestum = $propuestaTable->get($id);

        $propuestum->cerrar = 1;
        $propuestaTable->save($propuestum);

    }
   
    public function lista($id_orden= null)
    {
        //$propuesta = $this->paginate($this->Propuesta);
        //$this->set(compact('propuesta'));

      $propuesta = TableRegistry::get('propuesta');
        $query = $propuesta->find()
            ->select([
                'id_propuesta',
                'id_orden',
                'id_tipo',
                'no_orden',
                'nom_tipo' =>'c.descripcion',
                'titulo_propuesta',
                'nom_diputado'=>'d.nombre',
                'cerrar'
                ,])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'tipo_propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_tipo = propuesta.id_tipo'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_diputado = propuesta.id_diputado'
                ]
            ])
            ->where([
                'propuesta.id_orden'=>$id_orden
            ]);

        $this->set('propuesta', $this->paginate($query));
        $this->set('_serialize', ['propuesta']);
    }
}
