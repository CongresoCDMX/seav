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
 * Asistencia Controller
 *
 * @property \App\Model\Table\AsistenciaTable $Asistencia
 *
 * @method \App\Model\Entity\Asistencium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AsistenciaController extends AppController
{


    /* Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$asistencia = $this->paginate($this->Asistencia);
        //$this->set(compact('asistencia'));



        $asistencium = TableRegistry::get('asistencia');
        $query = $asistencium->find()
            ->select([
                'id_asistencia',
                'nom_diputado'=>'c.nombre',
                'fecha',
                'status'])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'c.id_diputado = Asistencia.id_diputado'
                ]
            ]);

        $this->set('asistencia', $this->paginate($query));
        $this->set('_serialize', ['asistencia']);
    }

    /**
     * View method
     *
     * @param string|null $id Asistencium id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asistencium = $this->Asistencia->get($id, [
            'contain' => []
        ]);

        $this->set('asistencium', $asistencium);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asistencium = $this->Asistencia->newEntity();
        if ($this->request->is('post')) {
            $asistencium = $this->Asistencia->patchEntity($asistencium, $this->request->getData());
            if ($this->Asistencia->save($asistencium)) {
                $this->Flash->success(__('The asistencium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asistencium could not be saved. Please, try again.'));
        }
        $this->set(compact('asistencium'));
    }

     /**
     * Edit method
     *
     * @param string|null $id Asistencium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asistencium = $this->Asistencia->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asistencium = $this->Asistencia->patchEntity($asistencium, $this->request->getData());
            if ($this->Asistencia->save($asistencium)) {
                $this->Flash->success(__('The asistencium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asistencium could not be saved. Please, try again.'));
        }
        $this->set(compact('asistencium'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Asistencium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asistencium = $this->Asistencia->get($id);
        if ($this->Asistencia->delete($asistencium)) {
            $this->Flash->success(__('The asistencium has been deleted.'));
        } else {
            $this->Flash->error(__('The asistencium could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   }
