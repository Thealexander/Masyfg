<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Periodosactividad Controller
 *
 * @property \App\Model\Table\PeriodosactividadTable $Periodosactividad
 */
class PeriodosactividadController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $periodosactividad = $this->paginate($this->Periodosactividad);

        $this->set(compact('periodosactividad'));
        $this->set('_serialize', ['periodosactividad']);
    }

    /**
     * View method
     *
     * @param string|null $id Periodosactividad id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $periodosactividad = $this->Periodosactividad->get($id, [
            'contain' => []
        ]);

        $this->set('periodosactividad', $periodosactividad);
        $this->set('_serialize', ['periodosactividad']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $periodosactividad = $this->Periodosactividad->newEntity();
        if ($this->request->is('post')) {
            $periodosactividad = $this->Periodosactividad->patchEntity($periodosactividad, $this->request->data);
            if ($this->Periodosactividad->save($periodosactividad)) {
                $this->Flash->success(__('Registro guardado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error, intenta nuevamente.'));
            }
        }
        $this->set(compact('periodosactividad'));
        $this->set('_serialize', ['periodosactividad']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Periodosactividad id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $periodosactividad = $this->Periodosactividad->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $periodosactividad = $this->Periodosactividad->patchEntity($periodosactividad, $this->request->data);
            if ($this->Periodosactividad->save($periodosactividad)) {
                $this->Flash->success(__('Edicion terminada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error, intenta nuevamente.'));
            }
        }
        $this->set(compact('periodosactividad'));
        $this->set('_serialize', ['periodosactividad']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Periodosactividad id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $periodosactividad = $this->Periodosactividad->get($id);
        if ($this->Periodosactividad->delete($periodosactividad)) {
            $this->Flash->success(__('el registro ha sido deshabilitado.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error, intenta nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
