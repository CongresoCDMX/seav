<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoSesion Controller
 *
 * @property \App\Model\Table\TipoSesionTable $TipoSesion
 *
 * @method \App\Model\Entity\TipoSesion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoSesionController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoSesion = $this->paginate($this->TipoSesion);

        $this->set(compact('tipoSesion'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Sesion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoSesion = $this->TipoSesion->get($id, [
            'contain' => []
        ]);

        $this->set('tipoSesion', $tipoSesion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoSesion = $this->TipoSesion->newEntity();
        if ($this->request->is('post')) {
            $tipoSesion = $this->TipoSesion->patchEntity($tipoSesion, $this->request->getData());
            if ($this->TipoSesion->save($tipoSesion)) {
                $this->Flash->success(__('The tipo sesion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo sesion could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoSesion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Sesion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoSesion = $this->TipoSesion->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoSesion = $this->TipoSesion->patchEntity($tipoSesion, $this->request->getData());
            if ($this->TipoSesion->save($tipoSesion)) {
                $this->Flash->success(__('The tipo sesion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo sesion could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoSesion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Sesion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoSesion = $this->TipoSesion->get($id);
        if ($this->TipoSesion->delete($tipoSesion)) {
            $this->Flash->success(__('The tipo sesion has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo sesion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
