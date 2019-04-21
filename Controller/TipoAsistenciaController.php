<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoAsistencia Controller
 *
 * @property \App\Model\Table\TipoAsistenciaTable $TipoAsistencia
 *
 * @method \App\Model\Entity\TipoAsistencium[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoAsistenciaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoAsistencia = $this->paginate($this->TipoAsistencia);

        $this->set(compact('tipoAsistencia'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Asistencium id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoAsistencium = $this->TipoAsistencia->get($id, [
            'contain' => []
        ]);

        $this->set('tipoAsistencium', $tipoAsistencium);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoAsistencium = $this->TipoAsistencia->newEntity();
        if ($this->request->is('post')) {
            $tipoAsistencium = $this->TipoAsistencia->patchEntity($tipoAsistencium, $this->request->getData());
            if ($this->TipoAsistencia->save($tipoAsistencium)) {
                $this->Flash->success(__('The tipo asistencium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo asistencium could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoAsistencium'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Asistencium id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoAsistencium = $this->TipoAsistencia->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoAsistencium = $this->TipoAsistencia->patchEntity($tipoAsistencium, $this->request->getData());
            if ($this->TipoAsistencia->save($tipoAsistencium)) {
                $this->Flash->success(__('The tipo asistencium has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo asistencium could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoAsistencium'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Asistencium id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoAsistencium = $this->TipoAsistencia->get($id);
        if ($this->TipoAsistencia->delete($tipoAsistencium)) {
            $this->Flash->success(__('The tipo asistencium has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo asistencium could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
