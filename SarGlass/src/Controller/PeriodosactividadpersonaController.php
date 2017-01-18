<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Periodosactividadpersona Controller
 *
 * @property \App\Model\Table\PeriodosactividadpersonaTable $Periodosactividadpersona
 */
class PeriodosactividadpersonaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Periodosactividad', 'Personas']
        ];
        $periodosactividadpersona = $this->paginate($this->Periodosactividadpersona);

        $this->set(compact('periodosactividadpersona'));
        $this->set('_serialize', ['periodosactividadpersona']);
    }

    /**
     * View method
     *
     * @param string|null $id Periodosactividadpersona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $periodosactividadpersona = $this->Periodosactividadpersona->get($id, [
            'contain' => ['Periodosactividad', 'Personas']
        ]);

        $this->set('periodosactividadpersona', $periodosactividadpersona);
        $this->set('_serialize', ['periodosactividadpersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $periodosactividadpersona = $this->Periodosactividadpersona->newEntity();
        if ($this->request->is('post')) {
            $periodosactividadpersona = $this->Periodosactividadpersona->patchEntity($periodosactividadpersona, $this->request->data);
            if ($this->Periodosactividadpersona->save($periodosactividadpersona)) {
                $this->Flash->success(__('TSe ha guardado el registro.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Intenta nuevamente, ha ocurrido un error.'));
            }
        }
        $periodosactividad = $this->Periodosactividadpersona->Periodosactividad->find('list', ['limit' => 200]);
        $personas = $this->Periodosactividadpersona->Personas->find('list', ['limit' => 200]);
        $this->set(compact('periodosactividadpersona', 'periodosactividad', 'personas'));
        $this->set('_serialize', ['periodosactividadpersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Periodosactividadpersona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $periodosactividadpersona = $this->Periodosactividadpersona->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $periodosactividadpersona = $this->Periodosactividadpersona->patchEntity($periodosactividadpersona, $this->request->data);
            if ($this->Periodosactividadpersona->save($periodosactividadpersona)) {
                $this->Flash->success(__('registro almcenado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error, intenta nuevamente.'));
            }
        }
        $periodosactividad = $this->Periodosactividadpersona->Periodosactividad->find('list', ['limit' => 200]);
        $personas = $this->Periodosactividadpersona->Personas->find('list', ['limit' => 200]);
        $this->set(compact('periodosactividadpersona', 'periodosactividad', 'personas'));
        $this->set('_serialize', ['periodosactividadpersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Periodosactividadpersona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $periodosactividadpersona = $this->Periodosactividadpersona->get($id);
        if ($this->Periodosactividadpersona->delete($periodosactividadpersona)) {
            $this->Flash->success(__('El registro ha si eliminado.'));
        } else {
            $this->Flash->error(__('Ocurrio un error al intentar eliminar el registro, intenta de  nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
