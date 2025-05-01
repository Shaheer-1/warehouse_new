<?php
return [
    'CakeDC/Auth.permissions' => [
        [
            'role' => "*",
            'plugin'=> "CakeDC/Users",
            'controller' => "*",
            'action' => "login",
            'bypassAuth' => true,
            'allowed' => true
        ],
        [
            'role' => "*",
            'plugin'=> "DebugKit",
            'controller' => "Requests",
            'action' => "*",
            'bypassAuth' => true,
            'allowed' => true
        ],
        [
            'role' => '*',
            'controller' => 'Cells',
            'action' => 'cellinfo',
            'bypassAuth' => true,
        ],
        [
            'role' => '*',
            'controller' => 'RackRows',
            'action' => 'rowinfo',
            'bypassAuth' => true,
        ],
    ],
];