<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        


        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/5/en/controllers/components/form-protection.html
         */
        $this->loadComponent('FormProtection');
        $config['Auth']['authorize']['CakeDC/Users.SimpleRbac'] = [
            // autoload permissions.php
            'autoload_config' => 'permissions',
            // role field in the Users table
            'role_field' => 'role',
            // default role, used in new users registered and also as role matcher when no role is available
            'default_role' => 'user',
            /*
             * This is a quick roles-permissions implementation
             * Rules are evaluated top-down, first matching rule will apply
             * Each line define
             *      [
             *          'role' => 'admin',
             *          'plugin', (optional, default = null)
             *          'prefix', (optional, default = null)
             *          'extension', (optional, default = null)
             *          'controller',
             *          'action',
             *          'allowed' (optional, default = true)
             *      ]
             * You could use '*' to match anything
             * Suggestion: put your rules into a specific config file
             */
            'permissions' => [], // you could set an array of permissions or load them using a file 'autoload_config'
            // log will default to the 'debug' value, matched rbac rules will be logged in debug.log by default when debug enabled
            'log' => true,
        ];
    }
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        // Load the Authentication component
        // $this->loadComponent('Authentication.Authentication', [
        //     'requireIdentity' => true,
        //     'unauthenticatedRedirect' => '/users/login',
        //     'loginAction' => [
        //         'plugin' => 'CakeDC/Users',
        //         'controller' => 'Users',
        //         'action' => 'login',
        //     ],
        // ]);
        // Allow specific actions to be public
        // $this->Authentication->allowUnauthenticated(['cellinfo']);
        // $this->Authentication->addUnauthenticatedActions(['cellinfo']);
    }
}
