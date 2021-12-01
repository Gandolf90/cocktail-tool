<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MengenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MengenTable Test Case
 */
class MengenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MengenTable
     */
    protected $Mengen;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Mengen',
        'app.Rezepte',
        'app.Zutaten',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Mengen') ? [] : ['className' => MengenTable::class];
        $this->Mengen = $this->getTableLocator()->get('Mengen', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Mengen);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MengenTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\MengenTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
