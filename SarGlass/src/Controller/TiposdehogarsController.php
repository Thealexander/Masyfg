<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tiposdehogars Controller
 *
 * @property \App\Model\Table\TiposdehogarsTable $Tiposdehogars
 */
class TiposdehogarsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $tiposdehogars = $this->paginate($this->Tiposdehogars);

        $this->set(compact('tiposdehogars'));
        $this->set('_serialize', ['tiposdehogars']);
    }

    /**
     * View method
     *
     * @param string|null $id Tiposdehogar id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiposdehogar = $this->Tiposdehogars->get($id, [
            'contain' => []
        ]);

        $this->set('tiposdehogar', $tiposdehogar);
        $this->set('_serialize', ['tiposdehogar']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiposdehogar = $this->Tiposdehogars->newEntity();
        if ($this->request->is('post')) {
            $tiposdehogar = $this->Tiposdehogars->patchEntity($tiposdehogar, $this->request->data);
            if ($this->Tiposdehogars->save($tiposdehogar)) {
                $this->Flash->success(__('Se ha agregado el item.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('tiposdehogar'));
        $this->set('_serialize', ['tiposdehogar']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tiposdehogar id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiposdehogar = $this->Tiposdehogars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiposdehogar = $this->Tiposdehogars->patchEntity($tiposdehogar, $this->request->data);
            if ($this->Tiposdehogars->save($tiposdehogar)) {
                $this->Flash->success(__('Se han almacenado los cambios.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $this->set(compact('tiposdehogar'));
        $this->set('_serialize', ['tiposdehogar']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tiposdehogar id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiposdehogar = $this->Tiposdehogars->get($id);
        if ($this->Tiposdehogars->delete($tiposdehogar)) {
            $this->Flash->success(__('Se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
