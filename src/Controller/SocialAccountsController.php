<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SocialAccounts Controller
 *
 */
class SocialAccountsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->SocialAccounts->find();
        $socialAccounts = $this->paginate($query);

        $this->set(compact('socialAccounts'));
    }

    /**
     * View method
     *
     * @param string|null $id Social Account id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socialAccount = $this->SocialAccounts->get($id, contain: []);
        $this->set(compact('socialAccount'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $socialAccount = $this->SocialAccounts->newEmptyEntity();
        if ($this->request->is('post')) {
            $socialAccount = $this->SocialAccounts->patchEntity($socialAccount, $this->request->getData());
            if ($this->SocialAccounts->save($socialAccount)) {
                $this->Flash->success(__('The social account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social account could not be saved. Please, try again.'));
        }
        $this->set(compact('socialAccount'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Social Account id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $socialAccount = $this->SocialAccounts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socialAccount = $this->SocialAccounts->patchEntity($socialAccount, $this->request->getData());
            if ($this->SocialAccounts->save($socialAccount)) {
                $this->Flash->success(__('The social account has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The social account could not be saved. Please, try again.'));
        }
        $this->set(compact('socialAccount'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Social Account id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socialAccount = $this->SocialAccounts->get($id);
        if ($this->SocialAccounts->delete($socialAccount)) {
            $this->Flash->success(__('The social account has been deleted.'));
        } else {
            $this->Flash->error(__('The social account could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
