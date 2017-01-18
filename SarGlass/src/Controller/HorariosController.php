<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Horarios Controller
 *
 * @property \App\Model\Table\HorariosTable $Horarios
 */
class HorariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $horarios = $this->paginate($this->Horarios);

        $this->set(compact('horarios'));
        $this->set('_serialize', ['horarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => ['Asistencias', 'Horariospersonas']
        ]);

        $this->set('horario', $horario);
        $this->set('_serialize', ['horario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $horario = $this->Horarios->newEntity();
        if ($this->request->is('post')) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->data);
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('El registro ha sido guardado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error, intenta nuevamente.'));
            }
        }
        $this->set(compact('horario'));
        $this->set('_serialize', ['horario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->data);
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('Registro almacenado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se pudo guardar el registro, intenta de nuevo.'));
            }
        }
        $this->set(compact('horario'));
        $this->set('_serialize', ['horario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horario = $this->Horarios->get($id);
        if ($this->Horarios->delete($horario)) {
            $this->Flash->success(__('El registro no se ha eliminado.'));
        } else {
            $this->Flash->error(__('El registro no ha sido almacenado, intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
