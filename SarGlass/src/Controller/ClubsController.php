<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clubs Controller
 *
 * @property \App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Proyectos', 'Personas']
        ];
        $clubs = $this->paginate($this->Clubs);

        $this->set(compact('clubs'));
        $this->set('_serialize', ['clubs']);
    }

    /**
     * View method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => ['Proyectos', 'Personas', 'Asistenciavoluntarios', 'Clubsvoluntarios', 'Estudiantes']
        ]);

        $this->set('club', $club);
        $this->set('_serialize', ['club']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $club = $this->Clubs->newEntity();
        if ($this->request->is('post')) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('El Club se ha creado Exitosamente.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Intente de nuevo, el club no se ha podido crear'));
            }
        }
        $proyectos = $this->Clubs->Proyectos->find('list', ['limit' => 200]);
        $personas = $this->Clubs->Personas->find('list', ['limit' => 200]);
        $this->set(compact('club', 'proyectos', 'personas'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $club = $this->Clubs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success(__('Se realizo con exito la edicion.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Se ha producido un error. Intenta de nuevo'));
            }
        }
        $proyectos = $this->Clubs->Proyectos->find('list', ['limit' => 200]);
        $personas = $this->Clubs->Personas->find('list', ['limit' => 200]);
        $this->set(compact('club', 'proyectos', 'personas'));
        $this->set('_serialize', ['club']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Club id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $club = $this->Clubs->get($id);
        if ($this->Clubs->delete($club)) {
            $this->Flash->success(__('El registro se elimino correctamente.'));
        } else {
            $this->Flash->error(__('intente de nuevo, hubo un error al intentar eliminar'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
