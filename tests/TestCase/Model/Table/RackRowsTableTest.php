<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RackRowsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RackRowsTable Test Case
 */
class RackRowsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RackRowsTable
     */
    protected $RackRows;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.RackRows',
        'app.Cells',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RackRows') ? [] : ['className' => RackRowsTable::class];
        $this->RackRows = $this->getTableLocator()->get('RackRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->RackRows);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RackRowsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RackRowsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
