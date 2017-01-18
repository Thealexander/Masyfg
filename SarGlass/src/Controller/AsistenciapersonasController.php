<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Asistenciapersonas Controller
 *
 * @property \App\Model\Table\AsistenciapersonasTable $Asistenciapersonas
 */
class AsistenciapersonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Asistencias']
        ];
        $asistenciapersonas = $this->paginate($this->Asistenciapersonas);

        $this->set(compact('asistenciapersonas'));
        $this->set('_serialize', ['asistenciapersonas']);
    }

    /**
     * View method
     *
     * @param string|null $id Asistenciapersona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $asistenciapersona = $this->Asistenciapersonas->get($id, [
            'contain' => ['Personas', 'Asistencias']
        ]);

        $this->set('asistenciapersona', $asistenciapersona);
        $this->set('_serialize', ['asistenciapersona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $asistenciapersona = $this->Asistenciapersonas->newEntity();
        if ($this->request->is('post')) {
            $asistenciapersona = $this->Asistenciapersonas->patchEntity($asistenciapersona, $this->request->data);
            if ($this->Asistenciapersonas->save($asistenciapersona)) {
                $this->Flash->success(__('Asistencia se guardo correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se produjo un error al registrar la asistencia, intenta de nuevo'));
            }
        }
        $personas = $this->Asistenciapersonas->Personas->find('list', ['limit' => 200]);
        $asistencias = $this->Asistenciapersonas->Asistencias->find('list', ['limit' => 200]);
        $this->set(compact('asistenciapersona', 'personas', 'asistencias'));
        $this->set('_serialize', ['asistenciapersona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asistenciapersona id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asistenciapersona = $this->Asistenciapersonas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $asistenciapersona = $this->Asistenciapersonas->patchEntity($asistenciapersona, $this->request->data);
            if ($this->Asistenciapersonas->save($asistenciapersona)) {
                $this->Flash->success(__('Modificacion terminada.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se guardo ninguna modificacion.'));
            }
        }
        $personas = $this->Asistenciapersonas->Personas->find('list', ['limit' => 200]);
        $asistencias = $this->Asistenciapersonas->Asistencias->find('list', ['limit' => 200]);
        $this->set(compact('asistenciapersona', 'personas', 'asistencias'));
        $this->set('_serialize', ['asistenciapersona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Asistenciapersona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asistenciapersona = $this->Asistenciapersonas->get($id);
        if ($this->Asistenciapersonas->delete($asistenciapersona)) {
            $this->Flash->success(__('Se elimino el registro'));
        } else {
            $this->Flash->error(__('Intente de nuevo, un error ocurrio.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
