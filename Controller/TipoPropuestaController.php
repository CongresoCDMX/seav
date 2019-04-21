<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;

/**
 * TipoPropuesta Controller
 *
 * @property \App\Model\Table\TipoPropuestaTable $TipoPropuesta
 *
 * @method \App\Model\Entity\TipoPropuestum[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoPropuestaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tipoPropuesta = $this->paginate($this->TipoPropuesta);

        $this->set(compact('tipoPropuesta'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipo Propuestum id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoPropuestum = $this->TipoPropuesta->get($id, [
            'contain' => []
        ]);

        $this->set('tipoPropuestum', $tipoPropuestum);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoPropuestum = $this->TipoPropuesta->newEntity();
        if ($this->request->is('post')) {
            $tipoPropuestum = $this->TipoPropuesta->patchEntity($tipoPropuestum, $this->request->getData());
            if ($this->TipoPropuesta->save($tipoPropuestum)) {
                $this->Flash->success(__('The tipo propuestum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo propuestum could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoPropuestum'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipo Propuestum id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoPropuestum = $this->TipoPropuesta->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoPropuestum = $this->TipoPropuesta->patchEntity($tipoPropuestum, $this->request->getData());
            if ($this->TipoPropuesta->save($tipoPropuestum)) {
                $this->Flash->success(__('The tipo propuestum has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipo propuestum could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoPropuestum'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipo Propuestum id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoPropuestum = $this->TipoPropuesta->get($id);
        if ($this->TipoPropuesta->delete($tipoPropuestum)) {
            $this->Flash->success(__('The tipo propuestum has been deleted.'));
        } else {
            $this->Flash->error(__('The tipo propuestum could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
