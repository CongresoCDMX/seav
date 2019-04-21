<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/26/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;

/**
 * ListaVoto Controller
 *
 * @property \App\Model\Table\ListaVotoTable $ListaVoto
 *
 * @method \App\Model\Entity\ListaVoto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ListaVotoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id_propuesta = null)
    {
        //$listaVoto = $this->paginate($this->ListaVoto);
        //$this->set(compact('listaVoto'));
        $propuestaTable=TableRegistry::get('propuesta');
        $propuesta=$propuestaTable->get($id_propuesta,['contain'=>[]]);

        $listaVoto = TableRegistry::get('listaVoto');
        $query = $listaVoto->find()
            ->select([
                'id_lista',
                'nom_propuesta'=>'c.titulo_propuesta',
                'nom_diputado'=>'d.nombre',
                'nom_tipo'=>'e.descripcion',
                'id_propuesta'=>'c.id_propuesta'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_diputado = listaVoto.id_diputado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta
            ]);
        $this->set('lista', $this->paginate($query));
        $this->set('_serialize', ['lista']);
        $this->set(compact('propuesta'));
    }

    /**
     * View method
     *
     * @param string|null $id Lista Voto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listaVoto = $this->ListaVoto->get($id, [
            'contain' => []
        ]);

        $this->set('listaVoto', $listaVoto);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listaVoto = $this->ListaVoto->newEntity();
        if ($this->request->is('post')) {
            $listaVoto = $this->ListaVoto->patchEntity($listaVoto, $this->request->getData());
            if ($this->ListaVoto->save($listaVoto)) {
                $this->Flash->success(__('The lista voto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lista voto could not be saved. Please, try again.'));
        }
        $this->set(compact('listaVoto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lista Voto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listaVoto = $this->ListaVoto->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listaVoto = $this->ListaVoto->patchEntity($listaVoto, $this->request->getData());
            if ($this->ListaVoto->save($listaVoto)) {
                $this->Flash->success(__('The lista voto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lista voto could not be saved. Please, try again.'));
        }
        $this->set(compact('listaVoto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lista Voto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listaVoto = $this->ListaVoto->get($id);
        if ($this->ListaVoto->delete($listaVoto)) {
            $this->Flash->success(__('The lista voto has been deleted.'));
        } else {
            $this->Flash->error(__('The lista voto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function listaDerecha ($id_propuesta = null){
        $this->viewBuilder()->setLayout('pantallas');
        //dump($id_propuesta);
        //$listaVoto = $this->paginate($this->ListaVoto);
        //$this->set(compact('listaVoto'));

        $listaVoto = TableRegistry::get('listaVoto');
        $query = $listaVoto->find()
            ->select([
                'id_lista',
                'nom_propuesta'=>'c.titulo_propuesta',
                'nom_diputado'=>'d.nombre',
                'nom_tipo'=>'e.descripcion'
            ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_diputado = listaVoto.id_diputado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta
            ])
            ->limit(33)
            ;

        $favor = $listaVoto->find()
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta,'e.id_tipo'=>1
            ])

            ->count()
        ;

        $en_contra = $listaVoto->find()
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta,'e.id_tipo'=>2
            ])

            ->count()
        ;
        $abstencion = $listaVoto->find()
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta,'e.id_tipo'=>3
            ])
            ->count()
        ;

        //dump($id_propuesta);
        $this->set('lista', $this->paginate($query));
        $this->set('_serialize', ['lista']);
        $this->set(compact('id_propuesta','favor','en_contra','abstencion'));

    }

    public function listaIzquierda ($id_propuesta = null){
        $this->viewBuilder()->setLayout('pantallas');

        $listaVoto = $this->paginate($this->ListaVoto);
        $this->set(compact('listaVoto'));


        $listaVoto = TableRegistry::get('listaVoto');
        $query = $listaVoto->find()
            ->select([
                'id_lista',
                'nom_propuesta'=>'c.titulo_propuesta',
                'nom_diputado'=>'d.nombre',
                'nom_tipo'=>'e.descripcion',
             ])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'diputado',
                    'type' => 'INNER',
                    'conditions' => 'd.id_diputado = listaVoto.id_diputado'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta
            ])
            ->limit(33)

        ;
        $favor = $listaVoto->find()
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta,'e.id_tipo'=>1
    ])
            ->count()
        ;

        $en_contra = $listaVoto->find()
                    ->join([
                        'c' => [
                            'table' => 'propuesta',
                            'type' => 'INNER',
                            'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                        ]
                    ])
                    ->join([
                        'e' => [
                            'table' => 'tipo_voto',
                            'type' => 'INNER',
                            'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                        ]
                    ])
                    ->where([
                        'c.id_propuesta'=>$id_propuesta,'e.id_tipo'=>2
            ])
                    ->count()
                ;
        $abstencion = $listaVoto->find()
            ->join([
                'c' => [
                    'table' => 'propuesta',
                    'type' => 'INNER',
                    'conditions' => 'c.id_propuesta = listaVoto.id_propuesta'
                ]
            ])
            ->join([
                'e' => [
                    'table' => 'tipo_voto',
                    'type' => 'INNER',
                    'conditions' => 'e.id_tipo = listaVoto.id_tipo'
                ]
            ])
            ->where([
                'c.id_propuesta'=>$id_propuesta,'e.id_tipo'=>3
            ])
            ->count()
        ;
        //&dump($favor);
        //dump($en_contra);
        //dump($abstencion);

        $this->set('lista', $this->paginate($query));
        //$this->set('Favor', $this->paginate($Favor));
        $this->set('_serialize', ['lista']);
        $this->set(compact('id_propuesta','favor','en_contra','abstencion'));



    }
}
