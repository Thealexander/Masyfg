<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Horariospersonas Controller
 *
 * @property \App\Model\Table\HorariospersonasTable $Horariospersonas
 */
class HorariospersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Horarios']
        ];
        $horariospersonas = $this->paginate($this->Horariospersonas);

        $this->set(compact('horariospersonas'));
        $this->set('_serialize', ['horariospersonas']);
    }

    /**
     * View method
     *
     * @param string|null $id Horariospersona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $horariospersona = $this->Horariospersonas->get($id, [
            'contain' => ['Personas', 'Horarios']
        ]);

        $this->set('horariospersona', $horariospersona);
        $this->set('_serialize', ['horariospersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $horariospersona = $this->Horariospersonas->newEntity();
        if ($this->request->is('post')) {
            $horariospersona = $this->Horariospersonas->patchEntity($horariospersona, $this->request->data);
            if ($this->Horariospersonas->save($horariospersona)) {
                $this->Flash->success(__('The horariospersona has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The horariospersona could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Horariospersonas->Personas->find('list', ['limit' => 200]);
        $horarios = $this->Horariospersonas->Horarios->find('list', ['limit' => 200]);
        $this->set(compact('horariospersona', 'personas', 'horarios'));
        $this->set('_serialize', ['horariospersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Horariospersona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horariospersona = $this->Horariospersonas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $horariospersona = $this->Horariospersonas->patchEntity($horariospersona, $this->request->data);
            if ($this->Horariospersonas->save($horariospersona)) {
                $this->Flash->success(__('The horariospersona has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The horariospersona could not be saved. Please, try again.'));
            }
        }
        $personas = $this->Horariospersonas->Personas->find('list', ['limit' => 200]);
        $horarios = $this->Horariospersonas->Horarios->find('list', ['limit' => 200]);
        $this->set(compact('horariospersona', 'personas', 'horarios'));
        $this->set('_serialize', ['horariospersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Horariospersona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horariospersona = $this->Horariospersonas->get($id);
        if ($this->Horariospersonas->delete($horariospersona)) {
            $this->Flash->success(__('The horariospersona has been deleted.'));
        } else {
            $this->Flash->error(__('The horariospersona could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
