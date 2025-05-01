<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * RackRows Controller
 *
 */
class RackRowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->RackRows->find();
        $rackRows = $this->paginate($query);

        $this->set(compact('rackRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Rack Row id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rackRow = $this->RackRows->get($id, contain: [
            'Cells'
        ]);
        $this->set(compact('rackRow'));
    }
    public function rowinfo($id = null)
    {
        $rackRow = $this->RackRows->get($id, contain: [
            'Cells' => ['Products'=> ['Principals']],
        ]);
        $this->set(compact('rackRow'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rackRow = $this->RackRows->newEmptyEntity();
        if ($this->request->is('post')) {
            $rackRow = $this->RackRows->patchEntity($rackRow, $this->request->getData());
            if ($this->RackRows->save($rackRow)) {
                $this->Flash->success(__('The rack row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rack row could not be saved. Please, try again.'));
        }
        $this->set(compact('rackRow'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rack Row id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rackRow = $this->RackRows->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rackRow = $this->RackRows->patchEntity($rackRow, $this->request->getData());
            if ($this->RackRows->save($rackRow)) {
                $this->Flash->success(__('The rack row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rack row could not be saved. Please, try again.'));
        }
        $this->set(compact('rackRow'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rack Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rackRow = $this->RackRows->get($id);
        if ($this->RackRows->delete($rackRow)) {
            $this->Flash->success(__('The rack row has been deleted.'));
        } else {
            $this->Flash->error(__('The rack row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
