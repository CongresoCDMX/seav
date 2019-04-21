<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
Time::setDefaultLocale('es-ES');

/**
 * OrdenDia Controller
 *
 * @property \App\Model\Table\OrdenDiaTable $OrdenDia
 *
 * @method \App\Model\Entity\OrdenDium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdenDiaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$ordenDia = $this->paginate($this->OrdenDia);
        //$this->set(compact('ordenDia'));


        $query = $this->OrdenDia
            ->find()
            ->select([
                'id_orden',
                'fecha_sesion',
                'nom_sesion'=>'c.sesion'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'tipo_sesion',
                    'type' => 'INNER',
                    'conditions' => 'c.id_sesion = OrdenDia.id_sesion'
                ]
            ]);

        $this->set('ordenDia', $this->paginate($query));
        $this->set('_serialize', ['ordenDia']);
    }

    /**
     * View method
     *
     * @param string|null $id Orden Dium id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordenDium = $this->OrdenDia->get($id, [
            'contain' => []
        ]);

        $this->set('ordenDium', $ordenDium);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordenDium = $this->OrdenDia->newEntity();

        $this->loadModel('tipo_sesion');
        $options = $this->tipo_sesion->find('list', ['keyField' => 'id_sesion',
            'valueField' => 'sesion']);
        $this->set('options', $options);

        if ($this->request->is('post')) {
            $ordenDium = $this->OrdenDia->patchEntity($ordenDium, $this->request->getData());
            if ($this->OrdenDia->save($ordenDium)) {
                $this->Flash->success(__('The orden dium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden dium could not be saved. Please, try again.'));
        }
        $this->set(compact('ordenDium'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Orden Dium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordenDium = $this->OrdenDia->get($id, [
            'contain' => []
        ]);

        $this->loadModel('tipo_sesion');
        $options = $this->tipo_sesion->find('list', ['keyField' => 'id_sesion',
            'valueField' => 'sesion']);
        $this->set('options', $options);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordenDium = $this->OrdenDia->patchEntity($ordenDium, $this->request->getData());
            if ($this->OrdenDia->save($ordenDium)) {
                $this->Flash->success(__('The orden dium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The orden dium could not be saved. Please, try again.'));
        }
        $this->set(compact('ordenDium'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Orden Dium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordenDium = $this->OrdenDia->get($id);
        if ($this->OrdenDia->delete($ordenDium)) {
            $this->Flash->success(__('The orden dium has been deleted.'));
        } else {
            $this->Flash->error(__('The orden dium could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function cerrar($id = null){
        $asistenciaTable = TableRegistry::get('lista_asistencia');
        $asistenciaum = $asistenciaTable->get($id);

        $asistenciaum->status = 1;
        $asistenciaTable->save($asistenciaum);
    }
}
