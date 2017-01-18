<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Organizacionesdeorigen Controller
 *
 * @property \App\Model\Table\OrganizacionesdeorigenTable $Organizacionesdeorigen
 */
class OrganizacionesdeorigenController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $organizacionesdeorigen = $this->paginate($this->Organizacionesdeorigen);

        $this->set(compact('organizacionesdeorigen'));
        $this->set('_serialize', ['organizacionesdeorigen']);
    }

    /**
     * View method
     *
     * @param string|null $id Organizacionesdeorigen id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $organizacionesdeorigen = $this->Organizacionesdeorigen->get($id, [
            'contain' => []
        ]);

        $this->set('organizacionesdeorigen', $organizacionesdeorigen);
        $this->set('_serialize', ['organizacionesdeorigen']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $organizacionesdeorigen = $this->Organizacionesdeorigen->newEntity();
        if ($this->request->is('post')) {
            $organizacionesdeorigen = $this->Organizacionesdeorigen->patchEntity($organizacionesdeorigen, $this->request->data);
            if ($this->Organizacionesdeorigen->save($organizacionesdeorigen)) {
                $this->Flash->success(__('EL registro ha sido correctamente almacenado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se ha guardado el registro, intenta nuevamente'));
            }
        }
        $this->set(compact('organizacionesdeorigen'));
        $this->set('_serialize', ['organizacionesdeorigen']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Organizacionesdeorigen id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $organizacionesdeorigen = $this->Organizacionesdeorigen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $organizacionesdeorigen = $this->Organizacionesdeorigen->patchEntity($organizacionesdeorigen, $this->request->data);
            if ($this->Organizacionesdeorigen->save($organizacionesdeorigen)) {
                $this->Flash->success(__('Los cambios se han guardado correctamente'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ser ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('organizacionesdeorigen'));
        $this->set('_serialize', ['organizacionesdeorigen']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Organizacionesdeorigen id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $organizacionesdeorigen = $this->Organizacionesdeorigen->get($id);
        if ($this->Organizacionesdeorigen->delete($organizacionesdeorigen)) {
            $this->Flash->success(__('EL registro ha sido eliminado'));
        } else {
            $this->Flash->error(__('Ser ha producido un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
