<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\MyUsersTable;
use Cake\Event\Event;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;

class MyUsersController extends AppController
{
    use LoginTrait;
    use RegisterTrait;

    /**
     * Initialize
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('CakeDC/Users.Setup');
        if ($this->components()->has('Security')) {
            $this->Security->setConfig(
                'unlockedActions',
                [
                    'login',
                    'webauthn2faRegister',
                    'webauthn2faRegisterOptions',
                    'webauthn2faAuthenticate',
                    'webauthn2faAuthenticateOptions',
                ]
            );
        }
    }

    //add your new actions, override, etc here
}