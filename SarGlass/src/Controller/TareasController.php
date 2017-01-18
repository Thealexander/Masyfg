<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tareas Controller
 *
 * @property \App\Model\Table\TareasTable $Tareas
 */
class TareasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tareas = $this->paginate($this->Tareas);

        $this->set(compact('tareas'));
        $this->set('_serialize', ['tareas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tarea id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tarea = $this->Tareas->get($id, [
            'contain' => []
        ]);

        $this->set('tarea', $tarea);
        $this->set('_serialize', ['tarea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tarea = $this->Tareas->newEntity();
        if ($this->request->is('post')) {
            $tarea = $this->Tareas->patchEntity($tarea, $this->request->data);
            if ($this->Tareas->save($tarea)) {
                $this->Flash->success(__('Tarea Agregada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('tarea'));
        $this->set('_serialize', ['tarea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tarea id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tarea = $this->Tareas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tarea = $this->Tareas->patchEntity($tarea, $this->request->data);
            if ($this->Tareas->save($tarea)) {
                $this->Flash->success(__('Cambios guardados.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('tarea'));
        $this->set('_serialize', ['tarea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tarea id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tarea = $this->Tareas->get($id);
        if ($this->Tareas->delete($tarea)) {
            $this->Flash->success(__('registro eliminado.'));
        } else {
            $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
