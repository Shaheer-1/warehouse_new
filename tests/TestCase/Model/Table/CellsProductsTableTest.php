<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CellsProductsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CellsProductsTable Test Case
 */
class CellsProductsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CellsProductsTable
     */
    protected $CellsProducts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.CellsProducts',
        'app.Cells',
        'app.Products',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CellsProducts') ? [] : ['className' => CellsProductsTable::class];
        $this->CellsProducts = $this->getTableLocator()->get('CellsProducts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CellsProducts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CellsProductsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CellsProductsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
