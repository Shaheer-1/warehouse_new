<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FailedPasswordAttempts Controller
 *
 */
class FailedPasswordAttemptsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->FailedPasswordAttempts->find();
        $failedPasswordAttempts = $this->paginate($query);

        $this->set(compact('failedPasswordAttempts'));
    }

    /**
     * View method
     *
     * @param string|null $id Failed Password Attempt id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $failedPasswordAttempt = $this->FailedPasswordAttempts->get($id, contain: []);
        $this->set(compact('failedPasswordAttempt'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $failedPasswordAttempt = $this->FailedPasswordAttempts->newEmptyEntity();
        if ($this->request->is('post')) {
            $failedPasswordAttempt = $this->FailedPasswordAttempts->patchEntity($failedPasswordAttempt, $this->request->getData());
            if ($this->FailedPasswordAttempts->save($failedPasswordAttempt)) {
                $this->Flash->success(__('The failed password attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The failed password attempt could not be saved. Please, try again.'));
        }
        $this->set(compact('failedPasswordAttempt'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Failed Password Attempt id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $failedPasswordAttempt = $this->FailedPasswordAttempts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $failedPasswordAttempt = $this->FailedPasswordAttempts->patchEntity($failedPasswordAttempt, $this->request->getData());
            if ($this->FailedPasswordAttempts->save($failedPasswordAttempt)) {
                $this->Flash->success(__('The failed password attempt has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The failed password attempt could not be saved. Please, try again.'));
        }
        $this->set(compact('failedPasswordAttempt'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Failed Password Attempt id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $failedPasswordAttempt = $this->FailedPasswordAttempts->get($id);
        if ($this->FailedPasswordAttempts->delete($failedPasswordAttempt)) {
            $this->Flash->success(__('The failed password attempt has been deleted.'));
        } else {
            $this->Flash->error(__('The failed password attempt could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
