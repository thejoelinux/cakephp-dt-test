<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoiceStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoiceStatusesTable Test Case
 */
class InvoiceStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoiceStatusesTable
     */
    public $InvoiceStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.InvoiceStatuses',
        'app.Invoices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InvoiceStatuses') ? [] : ['className' => InvoiceStatusesTable::class];
        $this->InvoiceStatuses = TableRegistry::getTableLocator()->get('InvoiceStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoiceStatuses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
