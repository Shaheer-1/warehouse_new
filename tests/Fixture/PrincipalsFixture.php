<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrincipalsFixture
 */
class PrincipalsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => '5323df43-4ee2-4ebd-a9dd-baf2d392883d',
                'principal_name' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-02-10 18:52:05',
                'modified' => '2025-02-10 18:52:05',
            ],
        ];
        parent::init();
    }
}
