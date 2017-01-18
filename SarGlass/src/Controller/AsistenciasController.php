<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Asistencias Controller
 *
 * @property \App\Model\Table\AsistenciasTable $Asistencias
 */
class AsistenciasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Horarios', 'Periodosactividad']
        ];
        $asistencias = $this->paginate($this->Asistencias);

        $this->set(compact('asistencias'));
        $this->set('_serialize', ['asistencias']);
    }

    /**
     * View method
     *
     * @param string|null $id Asistencia id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asistencia = $this->Asistencias->get($id, [
            'contain' => ['Horarios', 'Periodosactividad', 'Asistenciapersonas']
        ]);

        $this->set('asistencia', $asistencia);
        $this->set('_serialize', ['asistencia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asistencia = $this->Asistencias->newEntity();
        if ($this->request->is('post')) {
            $asistencia = $this->Asistencias->patchEntity($asistencia, $this->request->data);
            if ($this->Asistencias->save($asistencia)) {
                $this->Flash->success(__('Asistencia creada exitosamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error, intenta de nuevo.'));
            }
        }
        $horarios = $this->Asistencias->Horarios->find('list', ['limit' => 200]);
        $periodosactividad = $this->Asistencias->Periodosactividad->find('list', ['limit' => 200]);
        $this->set(compact('asistencia', 'horarios', 'periodosactividad'));
        $this->set('_serialize', ['asistencia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asistencia id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asistencia = $this->Asistencias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asistencia = $this->Asistencias->patchEntity($asistencia, $this->request->data);
            if ($this->Asistencias->save($asistencia)) {
                $this->Flash->success(__('Registro de asistencia guardado'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Error guardando modificaciones ... intenta de nuevo'));
            }
        }
        $horarios = $this->Asistencias->Horarios->find('list', ['limit' => 200]);
        $periodosactividad = $this->Asistencias->Periodosactividad->find('list', ['limit' => 200]);
        $this->set(compact('asistencia', 'horarios', 'periodosactividad'));
        $this->set('_serialize', ['asistencia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asistencia id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asistencia = $this->Asistencias->get($id);
        if ($this->Asistencias->delete($asistencia)) {
            $this->Flash->success(__('Registro eliminado  .'));
        } else {
            $this->Flash->error(__('Registro no se pudo eliminar intenta de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
