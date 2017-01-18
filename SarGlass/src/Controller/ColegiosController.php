<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Colegios Controller
 *
 * @property \App\Model\Table\ColegiosTable $Colegios
 */
class ColegiosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $colegios = $this->paginate($this->Colegios);

        $this->set(compact('colegios'));
        $this->set('_serialize', ['colegios']);
    }

    /**
     * View method
     *
     * @param string|null $id Colegio id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $colegio = $this->Colegios->get($id, [
            'contain' => ['Asistenciavoluntarios', 'Estudiantes', 'Profesores']
        ]);

        $this->set('colegio', $colegio);
        $this->set('_serialize', ['colegio']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $colegio = $this->Colegios->newEntity();
        if ($this->request->is('post')) {
            $colegio = $this->Colegios->patchEntity($colegio, $this->request->data);
            if ($this->Colegios->save($colegio)) {
                $this->Flash->success(__('El colegio ha sido registrado.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se registro el colegio, intenta nuevamente.'));
            }
        }
        $this->set(compact('colegio'));
        $this->set('_serialize', ['colegio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Colegio id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $colegio = $this->Colegios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $colegio = $this->Colegios->patchEntity($colegio, $this->request->data);
            if ($this->Colegios->save($colegio)) {
                $this->Flash->success(__('Las modificaciones en el Colegio han sido registrados.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocurrio un error al guardar la edicion, intenta nuevamente'));
            }
        }
        $this->set(compact('colegio'));
        $this->set('_serialize', ['colegio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Colegio id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $colegio = $this->Colegios->get($id);
        if ($this->Colegios->delete($colegio)) {
            $this->Flash->success(__('Se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('intenta de nuevo, ocurrio un error.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
