<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pasantes Controller
 *
 * @property \App\Model\Table\PasantesTable $Pasantes
 */
class PasantesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas']
        ];
        $pasantes = $this->paginate($this->Pasantes);

        $this->set(compact('pasantes'));
        $this->set('_serialize', ['pasantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Pasante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pasante = $this->Pasantes->get($id, [
            'contain' => ['Personas']
        ]);

        $this->set('pasante', $pasante);
        $this->set('_serialize', ['pasante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pasante = $this->Pasantes->newEntity();
        if ($this->request->is('post')) {
            $pasante = $this->Pasantes->patchEntity($pasante, $this->request->data);
            if ($this->Pasantes->save($pasante)) {
                $this->Flash->success(__('Pasante añadido.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo añadir al pasante intenta de nuevo.'));
            }
        }
        $personas = $this->Pasantes->Personas->find('list', ['limit' => 200]);
        $this->set(compact('pasante', 'personas'));
        $this->set('_serialize', ['pasante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pasante id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pasante = $this->Pasantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pasante = $this->Pasantes->patchEntity($pasante, $this->request->data);
            if ($this->Pasantes->save($pasante)) {
                $this->Flash->success(__('La edicion ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error, intenta de nuevo.'));
            }
        }
        $personas = $this->Pasantes->Personas->find('list', ['limit' => 200]);
        $this->set(compact('pasante', 'personas'));
        $this->set('_serialize', ['pasante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pasante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pasante = $this->Pasantes->get($id);
        if ($this->Pasantes->delete($pasante)) {
            $this->Flash->success(__('EL registro se ha eliminado.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error al ejecutar la orden, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
