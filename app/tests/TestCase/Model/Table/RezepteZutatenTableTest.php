<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RezepteZutatenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RezepteZutatenTable Test Case
 */
class RezepteZutatenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RezepteZutatenTable
     */
    protected $RezepteZutaten;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.RezepteZutaten',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('RezepteZutaten') ? [] : ['className' => RezepteZutatenTable::class];
        $this->RezepteZutaten = $this->getTableLocator()->get('RezepteZutaten', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->RezepteZutaten);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RezepteZutatenTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RezepteZutatenTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
