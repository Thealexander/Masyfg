<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Voluntarios Controller
 *
 * @property \App\Model\Table\VoluntariosTable $Voluntarios
 */
class VoluntariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Organizacionesdeorigen']
        ];
        $voluntarios = $this->paginate($this->Voluntarios);

        $this->set(compact('voluntarios'));
        $this->set('_serialize', ['voluntarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Voluntario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $voluntario = $this->Voluntarios->get($id, [
            'contain' => ['Personas', 'Organizacionesdeorigen', 'Asistenciavoluntarios']
        ]);

        $this->set('voluntario', $voluntario);
        $this->set('_serialize', ['voluntario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $voluntario = $this->Voluntarios->newEntity();
        if ($this->request->is('post')) {
            $voluntario = $this->Voluntarios->patchEntity($voluntario, $this->request->data);
            if ($this->Voluntarios->save($voluntario)) {
                $this->Flash->success(__('The voluntario has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The voluntario could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Voluntarios->Personas->find('list', ['limit' => 200]);
        $organizacionesdeorigen = $this->Voluntarios->Organizacionesdeorigen->find('list', ['limit' => 200]);
        $this->set(compact('voluntario', 'personas', 'organizacionesdeorigen'));
        $this->set('_serialize', ['voluntario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Voluntario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $voluntario = $this->Voluntarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $voluntario = $this->Voluntarios->patchEntity($voluntario, $this->request->data);
            if ($this->Voluntarios->save($voluntario)) {
                $this->Flash->success(__('The voluntario has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The voluntario could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Voluntarios->Personas->find('list', ['limit' => 200]);
        $organizacionesdeorigen = $this->Voluntarios->Organizacionesdeorigen->find('list', ['limit' => 200]);
        $this->set(compact('voluntario', 'personas', 'organizacionesdeorigen'));
        $this->set('_serialize', ['voluntario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Voluntario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $voluntario = $this->Voluntarios->get($id);
        if ($this->Voluntarios->delete($voluntario)) {
            $this->Flash->success(__('The voluntario has been deleted.'));
        } else {
            $this->Flash->error(__('The voluntario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
