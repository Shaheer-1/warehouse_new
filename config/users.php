<?php
return [
    'Users' => [
        'controller' => 'MyUsers',
        'Auth' => [
            'publicActions' => [
                'Cells/cellinfo',
                'RackRows/rowinfo'
                ]
        ]
    ],
];