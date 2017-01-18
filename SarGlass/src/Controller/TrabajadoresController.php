<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Trabajadores Controller
 *
 * @property \App\Model\Table\TrabajadoresTable $Trabajadores
 */
class TrabajadoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Cargos']
        ];
        $trabajadores = $this->paginate($this->Trabajadores);

        $this->set(compact('trabajadores'));
        $this->set('_serialize', ['trabajadores']);
    }

    /**
     * View method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trabajadore = $this->Trabajadores->get($id, [
            'contain' => ['Personas', 'Cargos']
        ]);

        $this->set('trabajadore', $trabajadore);
        $this->set('_serialize', ['trabajadore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trabajadore = $this->Trabajadores->newEntity();
        if ($this->request->is('post')) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $this->request->data);
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('The Se ha agregador al colaborador.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $personas = $this->Trabajadores->Personas->find('list', ['limit' => 200]);
        $cargos = $this->Trabajadores->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('trabajadore', 'personas', 'cargos'));
        $this->set('_serialize', ['trabajadore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trabajadore = $this->Trabajadores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trabajadore = $this->Trabajadores->patchEntity($trabajadore, $this->request->data);
            if ($this->Trabajadores->save($trabajadore)) {
                $this->Flash->success(__('Se han guardado los cambios.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $personas = $this->Trabajadores->Personas->find('list', ['limit' => 200]);
        $cargos = $this->Trabajadores->Cargos->find('list', ['limit' => 200]);
        $this->set(compact('trabajadore', 'personas', 'cargos'));
        $this->set('_serialize', ['trabajadore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Trabajadore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trabajadore = $this->Trabajadores->get($id);
        if ($this->Trabajadores->delete($trabajadore)) {
            $this->Flash->success(__('The se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
