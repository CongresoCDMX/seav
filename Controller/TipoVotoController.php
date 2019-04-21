<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoVoto Controller
 *
 * @property \App\Model\Table\TipoVotoTable $TipoVoto
 *
 * @method \App\Model\Entity\TipoVoto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoVotoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoVoto = $this->paginate($this->TipoVoto);

        $this->set(compact('tipoVoto'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Voto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoVoto = $this->TipoVoto->get($id, [
            'contain' => []
        ]);

        $this->set('tipoVoto', $tipoVoto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoVoto = $this->TipoVoto->newEntity();
        if ($this->request->is('post')) {
            $tipoVoto = $this->TipoVoto->patchEntity($tipoVoto, $this->request->getData());
            if ($this->TipoVoto->save($tipoVoto)) {
                $this->Flash->success(__('The tipo voto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo voto could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoVoto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Voto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoVoto = $this->TipoVoto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoVoto = $this->TipoVoto->patchEntity($tipoVoto, $this->request->getData());
            if ($this->TipoVoto->save($tipoVoto)) {
                $this->Flash->success(__('The tipo voto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo voto could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoVoto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Voto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoVoto = $this->TipoVoto->get($id);
        if ($this->TipoVoto->delete($tipoVoto)) {
            $this->Flash->success(__('The tipo voto has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo voto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
