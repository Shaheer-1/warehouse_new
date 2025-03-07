<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CellsFixture
 */
class CellsFixture extends TestFixture
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
                'id' => '9eb58e2c-52f5-42b5-8b62-cc60c03c0a5d',
                'rack_row_id' => 'b4cd75bf-102d-4985-a642-32835164bfab',
                'cell_code' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-02-10 18:52:04',
                'modified' => '2025-02-10 18:52:04',
            ],
        ];
        parent::init();
    }
}
