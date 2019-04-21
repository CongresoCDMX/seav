<?php
/**
Sistema de votacion electronico
Created by Dante Cuevas Gonzàlez on 3/21/19.
dante.cuevas@congresociudaddemexico.gob.mx
 **/
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 *  * Diputado Controller
 *   *
 *    * @property \App\Model\Table\DiputadoTable $Diputado
 *     *
 *      * @method \App\Model\Entity\Diputado[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 *       */
class DiputadoController extends AppController
{

    /**
     *      * Index method
     *           *
     *                * @return \Cake\Http\Response|void
     *                     */
    public function index()
    {


        //$diputado = $this->paginate($this->Diputado);
        //$this->set(compact('diputado'));


        $diputado = TableRegistry::get('Diputado');
        $query = $diputado->find()
            ->select([
                'id_diputado',
                'nombre',
                'nom_partido'=>'c.nombre',
                'nom_genero'=>'d.genero',])
            ->enableHydration(false)
            ->join([
                'c' => [
                    'table' => 'partido',
                    'type' => 'INNER',
                    'conditions' => 'c.id_partido = Diputado.id_partido'
                ]
            ])
            ->join([
                'd' => [
                    'table' => 'genero',
                    'type' => 'INNER',
                    'conditions' => 'd.id_genero = Diputado.id_genero'
                ]
            ]);

        $this->set('diputado', $this->paginate($query));
        $this->set('_serialize', ['diputado']);

    }

    /**
     *      * View method
     *           *
     *                * @param string|null $id Diputado id.
     *                     * @return \Cake\Http\Response|void
     *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     *                               */
    public function view($id = null)
    {


        $diputado = $this->Diputado->get($id, [
            'contain' => []
        ]);

        $this->set('diputado', $diputado);
    }

    /**
     *      * Add method
     *           *
     *                * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     *                     */
    public function add()
    {
        $this->loadModel('partido');
        $options = $this->partido->find('list', ['keyField' => 'id_partido',
            'valueField' => 'nombre']);
        $this->set('options', $options);

        $this->loadModel('genero');
        $genero = $this->genero->find('list', ['keyField' => 'id_genero', 'valueField' => 'genero']);
        $this->set('genero', $genero);

        $diputado = $this->Diputado->newEntity();//Nuevo objeto de clase Entity
        if ($this->request->is('post')) { //validas si el registro viene por método post
            $diputado = $this->Diputado->patchEntity($diputado, $this->request->getData()); //hacemos la petición de la tabla Diputado del objetop al controler y envia al model
            $image = $this->request->getData('imagen');
            $sub_folder = 'diputado';//creamos la carpeta en proyecto diputado
            $fileOk = $this->uploadFiles('img/files', $image, $sub_folder);
            //dump($sub_folder);
            if (array_key_exists('urls', $fileOk)) {
                $diputado->imagen = str_replace('img/', '', $fileOk['urls'][0]);
            }

            if ($this->Diputado->save($diputado)) {
                $this->Flash->success(__('The diputado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diputado could not be saved. Please, try again.'));
        }
        $this->set(compact('diputado'));//convierto la variable en texto
    }

    /**
     *      * Edit method
     *           *
     *                * @param string|null $id Diputado id.
     *                     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     *                               */
    public function edit($id = null)
    {

        $diputado = $this->Diputado->get($id, [
            'contain' => []
        ]);


        $this->loadModel('partido');
        $options = $this->partido->find('list', ['keyField' => 'id_partido',
            'valueField' => 'nombre']);
        $this->set('options', $options);

        $this->loadModel('genero');
        $genero = $this->genero->find('list', ['keyField' => 'id_genero', 'valueField' => 'genero']);
        $this->set('genero', $genero);

        $this->loadModel('partido');
        $options = $this->partido->find('list', ['keyField' => 'id_partido',
            'valueField' => 'nombre']);
        $this->set('options', $options);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $diputado = $this->Diputado->patchEntity($diputado, $this->request->getData());
            /*
            $image = $this->request->getData('imagen');
            $sub_folder = 'diputado';//creamos la carpeta en proyecto diputado
            $fileOk = $this->uploadFiles('img\files', $image, $sub_folder);
            //dump($sub_folder);
            if (array_key_exists('urls', $fileOk)) {
                $diputado->imagen = str_replace('img/', '', $fileOk['urls'][0]);
            }*/
            if ($this->Diputado->save($diputado)) {
                $this->Flash->success(__('The diputado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diputado could not be saved. Please, try again.'));
        }
        $this->set(compact('diputado'));
    }

    /**
     *      * Delete method
     *           *
     *                * @param string|null $id Diputado id.
     *                     * @return \Cake\Http\Response|null Redirects to index.
     *                          * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     *                               */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diputado = $this->Diputado->get($id);
        if ($this->Diputado->delete($diputado)) {
            $this->Flash->success(__('The diputado has been deleted.'));
        } else {
            $this->Flash->error(__('The diputado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function pa($arr) {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    function uploadFiles($folder, $file, $sub_folder) {
        // setup dir names absolute and relative
        $folder_url = WWW_ROOT . $folder;
        $rel_url = $folder;
        //dump($folder_url);
        //dump($rel_url);
           // create the folder if it does not exist
        if (!is_dir($folder_url)) {
            mkdir($folder_url);
        }

        // if itemId is set create an item folder
        if ($sub_folder) {
            // set new absolute folder
            $folder_url = WWW_ROOT . $folder . DS . $sub_folder;
            // set new relative folder
            $rel_url = $folder . DS . $sub_folder;
            // create directory
            if (!is_dir($folder_url)) {
                mkdir($folder_url);
            }
        }

        // list of permitted file types, this is only images but documents can be added
        $permitted = array('image' . DS . 'jpg', 'image' . DS . 'JPG', 'image' . DS . 'gif', 'image' . DS . 'jpeg', 'image' . DS . 'pjpeg', 'image' . DS . 'png');

        $filename = str_replace(' ', '_', $file['name']);

        //echo $filename;
        $typeOK=false;
        foreach ($permitted as $type) {
            //dump($type);
            if ($type) {
                //dump($type);
                $typeOK = true;
                 break;
            }
        }


        //dump($permitted);
        //dump($file);
        //dump($filename);
        //dump($typeOK);
        // if file type ok upload the file
        if ($typeOK) {
            // switch based on error code
            switch ($file['error']) {
                case 0:
                    // check filename already exists
                    if (!file_exists($folder_url . DS . $filename)) {
                        // create full filename
                        //$full_url = $folder_url . DS . $filename;
                        $url = $rel_url . DS . $filename;
                        //dump($url);
                        // upload the file
                        $success = move_uploaded_file($file['tmp_name'], $url);
                        // if upload was successful
                        if ($success) {
                            // save the url of the file
                            $result['urls'][] = $url;
                        } else {
                            $result['errors'][] = "Error.";
                            $this->Flash->error(__('Error uploaded ' . $filename . ' Please try again.'));
                        }
                    } else {
                        // $result['errors'][] = "Error uploaded $filename. Image already loaded, Please try again.";
                        $result['errors'][] = "Error.";
                        $this->Flash->error(__('Error  ' . $filename . ' already loaded, Please try again.'));
                    }
                    break;
                case 3:
                    // an error occured
                    $result['errors'][] = "Error.";
                    $this->Flash->error(__('Error uploading ' . $filename . ' Please try again.'));
                    break;
                default:
                    // an error occured
                    $result['errors'][] = "Error.";
                    $this->Flash->error(__('System error uploading ' . $filename . ' Contact webmaster.'));
                    break;
            }
        } elseif ($file['error'] == 4) {
            // no file was selected for upload
            $result['errors'][] = "Error.";
            $this->Flash->error(__('No file Selected'));
        } else {
            // unacceptable file type
            $result['errors'][] = "Error.";
            $this->Flash->error(__($filename . 'El archivo no pudo ser cargado. Los tipos de  archivos admitidos son : gif, jpg, png.'));
        }

        return $result;
    }

    function BorrarFile($imagepath) {
        $sys_path = WWW_ROOT . $imagepath;
        $file = new File($sys_path);
        $this->log($sys_path, 'debug');

        if ($file->exists()) {
            $file->delete();
        }
    }
}

