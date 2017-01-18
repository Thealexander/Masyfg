<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tareasvoluntarios Controller
 *
 * @property \App\Model\Table\TareasvoluntariosTable $Tareasvoluntarios
 */
class TareasvoluntariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tareasvoluntarios = $this->paginate($this->Tareasvoluntarios);

        $this->set(compact('tareasvoluntarios'));
        $this->set('_serialize', ['tareasvoluntarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Tareasvoluntario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tareasvoluntario = $this->Tareasvoluntarios->get($id, [
            'contain' => []
        ]);

        $this->set('tareasvoluntario', $tareasvoluntario);
        $this->set('_serialize', ['tareasvoluntario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tareasvoluntario = $this->Tareasvoluntarios->newEntity();
        if ($this->request->is('post')) {
            $tareasvoluntario = $this->Tareasvoluntarios->patchEntity($tareasvoluntario, $this->request->data);
            if ($this->Tareasvoluntarios->save($tareasvoluntario)) {
                $this->Flash->success(__('Se ha agregado el item.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('tareasvoluntario'));
        $this->set('_serialize', ['tareasvoluntario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tareasvoluntario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tareasvoluntario = $this->Tareasvoluntarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tareasvoluntario = $this->Tareasvoluntarios->patchEntity($tareasvoluntario, $this->request->data);
            if ($this->Tareasvoluntarios->save($tareasvoluntario)) {
                $this->Flash->success(__('Se han guardado los cambios.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('tareasvoluntario'));
        $this->set('_serialize', ['tareasvoluntario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tareasvoluntario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tareasvoluntario = $this->Tareasvoluntarios->get($id);
        if ($this->Tareasvoluntarios->delete($tareasvoluntario)) {
            $this->Flash->success(__('Se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
