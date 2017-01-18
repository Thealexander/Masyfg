<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Profesores Controller
 *
 * @property \App\Model\Table\ProfesoresTable $Profesores
 */
class ProfesoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Colegios']
        ];
        $profesores = $this->paginate($this->Profesores);

        $this->set(compact('profesores'));
        $this->set('_serialize', ['profesores']);
    }

    /**
     * View method
     *
     * @param string|null $id Profesore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profesore = $this->Profesores->get($id, [
            'contain' => ['Personas', 'Colegios']
        ]);

        $this->set('profesore', $profesore);
        $this->set('_serialize', ['profesore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profesore = $this->Profesores->newEntity();
        if ($this->request->is('post')) {
            $profesore = $this->Profesores->patchEntity($profesore, $this->request->data);
            if ($this->Profesores->save($profesore)) {
                $this->Flash->success(__('Se ha agregado el registro correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('THa ocurrido un error, intenta de nuevo.'));
            }
        }
        $personas = $this->Profesores->Personas->find('list', ['limit' => 200]);
        $colegios = $this->Profesores->Colegios->find('list', ['limit' => 200]);
        $this->set(compact('profesore', 'personas', 'colegios'));
        $this->set('_serialize', ['profesore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profesore id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profesore = $this->Profesores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profesore = $this->Profesores->patchEntity($profesore, $this->request->data);
            if ($this->Profesores->save($profesore)) {
                $this->Flash->success(__('Los cambios se han guardado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error, intenta de nuevo.'));
            }
        }
        $personas = $this->Profesores->Personas->find('list', ['limit' => 200]);
        $colegios = $this->Profesores->Colegios->find('list', ['limit' => 200]);
        $this->set(compact('profesore', 'personas', 'colegios'));
        $this->set('_serialize', ['profesore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profesore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profesore = $this->Profesores->get($id);
        if ($this->Profesores->delete($profesore)) {
            $this->Flash->success(__('EL registro ha sido eliminado.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
