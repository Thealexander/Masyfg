<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clubsvoluntarios Controller
 *
 * @property \App\Model\Table\ClubsvoluntariosTable $Clubsvoluntarios
 */
class ClubsvoluntariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs', 'Personas']
        ];
        $clubsvoluntarios = $this->paginate($this->Clubsvoluntarios);

        $this->set(compact('clubsvoluntarios'));
        $this->set('_serialize', ['clubsvoluntarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Clubsvoluntario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clubsvoluntario = $this->Clubsvoluntarios->get($id, [
            'contain' => ['Clubs', 'Personas']
        ]);

        $this->set('clubsvoluntario', $clubsvoluntario);
        $this->set('_serialize', ['clubsvoluntario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clubsvoluntario = $this->Clubsvoluntarios->newEntity();
        if ($this->request->is('post')) {
            $clubsvoluntario = $this->Clubsvoluntarios->patchEntity($clubsvoluntario, $this->request->data);
            if ($this->Clubsvoluntarios->save($clubsvoluntario)) {
                $this->Flash->success(__('Se ha registrado Volutario a Club.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se produjo un error, intente de nuevo.'));
            }
        }
        $clubs = $this->Clubsvoluntarios->Clubs->find('list', ['limit' => 200]);
        $personas = $this->Clubsvoluntarios->Personas->find('list', ['limit' => 200]);
        $this->set(compact('clubsvoluntario', 'clubs', 'personas'));
        $this->set('_serialize', ['clubsvoluntario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clubsvoluntario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clubsvoluntario = $this->Clubsvoluntarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clubsvoluntario = $this->Clubsvoluntarios->patchEntity($clubsvoluntario, $this->request->data);
            if ($this->Clubsvoluntarios->save($clubsvoluntario)) {
                $this->Flash->success(__('The clubsvoluntario has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The clubsvoluntario could not be saved. Please, try again.'));
            }
        }
        $clubs = $this->Clubsvoluntarios->Clubs->find('list', ['limit' => 200]);
        $personas = $this->Clubsvoluntarios->Personas->find('list', ['limit' => 200]);
        $this->set(compact('clubsvoluntario', 'clubs', 'personas'));
        $this->set('_serialize', ['clubsvoluntario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clubsvoluntario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clubsvoluntario = $this->Clubsvoluntarios->get($id);
        if ($this->Clubsvoluntarios->delete($clubsvoluntario)) {
            $this->Flash->success(__('Registro ha sido eliminado.'));
        } else {
            $this->Flash->error(__('Se produjo un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
