<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CellsProductsFixture
 */
class CellsProductsFixture extends TestFixture
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
                'id' => 'fcfb5e15-27a1-417f-a724-4efe5c0742b3',
                'cell_id' => '96b26a34-a8d5-4aca-a8d4-627dc0e80386',
                'product_id' => 'a536d9bb-439d-4016-8d8e-3ef7f86f02fb',
                'created' => '2025-02-10 18:52:04',
                'modified' => '2025-02-10 18:52:04',
            ],
        ];
        parent::init();
    }
}
