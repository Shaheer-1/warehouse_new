<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CellsProducts Controller
 *
 */
class CellsProductsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CellsProducts->find();
        $cellsProducts = $this->paginate($query);

        $this->set(compact('cellsProducts'));
    }

    /**
     * View method
     *
     * @param string|null $id Cells Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cellsProduct = $this->CellsProducts->get($id, contain: []);
        $this->set(compact('cellsProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cellsProduct = $this->CellsProducts->newEmptyEntity();
        if ($this->request->is('post')) {
            $cellsProduct = $this->CellsProducts->patchEntity($cellsProduct, $this->request->getData());
            if ($this->CellsProducts->save($cellsProduct)) {
                $this->Flash->success(__('The cells product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cells product could not be saved. Please, try again.'));
        }
        $this->set(compact('cellsProduct'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cells Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cellsProduct = $this->CellsProducts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cellsProduct = $this->CellsProducts->patchEntity($cellsProduct, $this->request->getData());
            if ($this->CellsProducts->save($cellsProduct)) {
                $this->Flash->success(__('The cells product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cells product could not be saved. Please, try again.'));
        }
        $this->set(compact('cellsProduct'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cells Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cellsProduct = $this->CellsProducts->get($id);
        if ($this->CellsProducts->delete($cellsProduct)) {
            $this->Flash->success(__('The cells product has been deleted.'));
        } else {
            $this->Flash->error(__('The cells product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
