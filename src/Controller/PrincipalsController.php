<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Principals Controller
 *
 */
class PrincipalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Principals->find();
        $principals = $this->paginate($query);

        $this->set(compact('principals'));
    }

    /**
     * View method
     *
     * @param string|null $id Principal id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $principal = $this->Principals->get($id, contain: [
            'Products'
        ]);
        $this->set(compact('principal'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $principal = $this->Principals->newEmptyEntity();
        if ($this->request->is('post')) {
            $principal = $this->Principals->patchEntity($principal, $this->request->getData());
            if ($this->Principals->save($principal)) {
                $this->Flash->success(__('The principal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The principal could not be saved. Please, try again.'));
        }
        $this->set(compact('principal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Principal id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $principal = $this->Principals->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $principal = $this->Principals->patchEntity($principal, $this->request->getData());
            if ($this->Principals->save($principal)) {
                $this->Flash->success(__('The principal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The principal could not be saved. Please, try again.'));
        }
        $this->set(compact('principal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Principal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $principal = $this->Principals->get($id);
        if ($this->Principals->delete($principal)) {
            $this->Flash->success(__('The principal has been deleted.'));
        } else {
            $this->Flash->error(__('The principal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
