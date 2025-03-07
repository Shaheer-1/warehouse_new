<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
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
                'id' => 'e4a97abe-7074-4ebe-b56d-6e0cb946c31c',
                'principal_id' => 'd0a6da37-5627-400c-b341-d1ea97fc0757',
                'sku' => 'Lorem ipsum dolor sit amet',
                'product_details' => 'Lorem ipsum dolor sit amet',
                'created' => '2025-02-10 18:52:06',
                'modified' => '2025-02-10 18:52:06',
            ],
        ];
        parent::init();
    }
}
