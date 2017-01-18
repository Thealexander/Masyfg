<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Empresas Controller
 *
 * @property \App\Model\Table\EmpresasTable $Empresas
 */
class EmpresasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $empresas = $this->paginate($this->Empresas);

        $this->set(compact('empresas'));
        $this->set('_serialize', ['empresas']);
    }

    /**
     * View method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);

        $this->set('empresa', $empresa);
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $empresa = $this->Empresas->newEntity();
        if ($this->request->is('post')) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->data);
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('La empresa Socia ha sido alamacenada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se puede guardar la informacion de esta empresa.'));
            }
        }
        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $empresa = $this->Empresas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $empresa = $this->Empresas->patchEntity($empresa, $this->request->data);
            if ($this->Empresas->save($empresa)) {
                $this->Flash->success(__('La edicion de la empresa ha terminado exitosamente'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A ocurrido un error durante la edicion, intenta de nuevo.'));
            }
        }
        $this->set(compact('empresa'));
        $this->set('_serialize', ['empresa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Empresa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $empresa = $this->Empresas->get($id);
        if ($this->Empresas->delete($empresa)) {
            $this->Flash->success(__('Registro eliminado exitosamente.'));
        } else {
            $this->Flash->error(__('Hubo un error al ejecutar, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
