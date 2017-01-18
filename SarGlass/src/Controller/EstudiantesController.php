<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estudiantes Controller
 *
 * @property \App\Model\Table\EstudiantesTable $Estudiantes
 */
class EstudiantesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Personas', 'Turnos', 'Clubs', 'Tiposdehogars', 'Colegios']
        ];
        $estudiantes = $this->paginate($this->Estudiantes);

        $this->set(compact('estudiantes'));
        $this->set('_serialize', ['estudiantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estudiante = $this->Estudiantes->get($id, [
            'contain' => ['Personas', 'Turnos', 'Clubs', 'Tiposdehogars', 'Colegios']
        ]);

        $this->set('estudiante', $estudiante);
        $this->set('_serialize', ['estudiante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estudiante = $this->Estudiantes->newEntity();
        if ($this->request->is('post')) {
            $estudiante = $this->Estudiantes->patchEntity($estudiante, $this->request->data);
            if ($this->Estudiantes->save($estudiante)) {
                $this->Flash->success(__('El estudiante ha sido agregado correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('ha ocurrido un error, intenta de nuevo.'));
            }
        }
        $personas = $this->Estudiantes->Personas->find('list', ['limit' => 200]);
        $turnos = $this->Estudiantes->Turnos->find('list', ['limit' => 200]);
        $clubs = $this->Estudiantes->Clubs->find('list', ['limit' => 200]);
        $tiposdehogars = $this->Estudiantes->Tiposdehogars->find('list', ['limit' => 200]);
        $colegios = $this->Estudiantes->Colegios->find('list', ['limit' => 200]);
        $this->set(compact('estudiante', 'personas', 'turnos', 'clubs', 'tiposdehogars', 'colegios'));
        $this->set('_serialize', ['estudiante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estudiante = $this->Estudiantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estudiante = $this->Estudiantes->patchEntity($estudiante, $this->request->data);
            if ($this->Estudiantes->save($estudiante)) {
                $this->Flash->success(__('Los datos se han almacenado correctamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('A ocurrido un error al guarda, intenta de nuevo.'));
            }
        }
        $personas = $this->Estudiantes->Personas->find('list', ['limit' => 200]);
        $turnos = $this->Estudiantes->Turnos->find('list', ['limit' => 200]);
        $clubs = $this->Estudiantes->Clubs->find('list', ['limit' => 200]);
        $tiposdehogars = $this->Estudiantes->Tiposdehogars->find('list', ['limit' => 200]);
        $colegios = $this->Estudiantes->Colegios->find('list', ['limit' => 200]);
        $this->set(compact('estudiante', 'personas', 'turnos', 'clubs', 'tiposdehogars', 'colegios'));
        $this->set('_serialize', ['estudiante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Estudiante id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estudiante = $this->Estudiantes->get($id);
        if ($this->Estudiantes->delete($estudiante)) {
            $this->Flash->success(__('se ha eliminado el registro.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error, intenta guardar nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
