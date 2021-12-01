<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RezepteTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RezepteTable Test Case
 */
class RezepteTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RezepteTable
     */
    protected $Rezepte;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Rezepte',
        'app.Mengen',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Rezepte') ? [] : ['className' => RezepteTable::class];
        $this->Rezepte = $this->getTableLocator()->get('Rezepte', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Rezepte);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RezepteTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RezepteTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
