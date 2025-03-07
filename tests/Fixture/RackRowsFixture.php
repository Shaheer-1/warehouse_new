<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RackRowsFixture
 */
class RackRowsFixture extends TestFixture
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
                'id' => '1287f52f-3c06-4221-b811-3fcc2a7c280b',
                'row_code' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-02-10 18:52:06',
                'modified' => '2025-02-10 18:52:06',
            ],
        ];
        parent::init();
    }
}
