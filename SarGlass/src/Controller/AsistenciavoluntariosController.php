<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Asistenciavoluntarios Controller
 *
 * @property \App\Model\Table\AsistenciavoluntariosTable $Asistenciavoluntarios
 */
class AsistenciavoluntariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Asistencias', 'Colegios', 'Clubs', 'Voluntarios']
        ];
        $asistenciavoluntarios = $this->paginate($this->Asistenciavoluntarios);

        $this->set(compact('asistenciavoluntarios'));
        $this->set('_serialize', ['asistenciavoluntarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Asistenciavoluntario id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asistenciavoluntario = $this->Asistenciavoluntarios->get($id, [
            'contain' => ['Asistencias', 'Colegios', 'Clubs', 'Voluntarios']
        ]);

        $this->set('asistenciavoluntario', $asistenciavoluntario);
        $this->set('_serialize', ['asistenciavoluntario']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asistenciavoluntario = $this->Asistenciavoluntarios->newEntity();
        if ($this->request->is('post')) {
            $asistenciavoluntario = $this->Asistenciavoluntarios->patchEntity($asistenciavoluntario, $this->request->data);
            if ($this->Asistenciavoluntarios->save($asistenciavoluntario)) {
                $this->Flash->success(__('Asistencia de voluntario registrada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Intente nuevamente, ocurrio un error.'));
            }
        }
        $asistencias = $this->Asistenciavoluntarios->Asistencias->find('list', ['limit' => 200]);
        $colegios = $this->Asistenciavoluntarios->Colegios->find('list', ['limit' => 200]);
        $clubs = $this->Asistenciavoluntarios->Clubs->find('list', ['limit' => 200]);
        $voluntarios = $this->Asistenciavoluntarios->Voluntarios->find('list', ['limit' => 200]);
        $this->set(compact('asistenciavoluntario', 'asistencias', 'colegios', 'clubs', 'voluntarios'));
        $this->set('_serialize', ['asistenciavoluntario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asistenciavoluntario id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asistenciavoluntario = $this->Asistenciavoluntarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asistenciavoluntario = $this->Asistenciavoluntarios->patchEntity($asistenciavoluntario, $this->request->data);
            if ($this->Asistenciavoluntarios->save($asistenciavoluntario)) {
                $this->Flash->success(__('The asistenciavoluntario has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Intente de nuevo, error al registrar asistencia de voluntario'));
            }
        }
        $asistencias = $this->Asistenciavoluntarios->Asistencias->find('list', ['limit' => 200]);
        $colegios = $this->Asistenciavoluntarios->Colegios->find('list', ['limit' => 200]);
        $clubs = $this->Asistenciavoluntarios->Clubs->find('list', ['limit' => 200]);
        $voluntarios = $this->Asistenciavoluntarios->Voluntarios->find('list', ['limit' => 200]);
        $this->set(compact('asistenciavoluntario', 'asistencias', 'colegios', 'clubs', 'voluntarios'));
        $this->set('_serialize', ['asistenciavoluntario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asistenciavoluntario id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asistenciavoluntario = $this->Asistenciavoluntarios->get($id);
        if ($this->Asistenciavoluntarios->delete($asistenciavoluntario)) {
            $this->Flash->success(__('El registro ha sido elimanado'));
        } else {
            $this->Flash->error(__('El registro no se pudo eliminar; intenta de nuevo'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
