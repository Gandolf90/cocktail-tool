<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZutatenFixture
 */
class ZutatenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'zutaten';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'preis' => 1.5,
                'menge' => 1.5,
                'einheit' => '',
                'alkoholgehalt' => 1.5,
                'beschreibung' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
