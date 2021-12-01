<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZutatenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZutatenTable Test Case
 */
class ZutatenTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ZutatenTable
     */
    protected $Zutaten;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Zutaten',
        'app.Rezepte',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Zutaten') ? [] : ['className' => ZutatenTable::class];
        $this->Zutaten = $this->getTableLocator()->get('Zutaten', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Zutaten);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ZutatenTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
