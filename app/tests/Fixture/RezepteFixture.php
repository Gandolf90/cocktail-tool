<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RezepteFixture
 */
class RezepteFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'rezepte';
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
                'beschreibung' => 'Lorem ipsum dolor sit amet',
                'anleitung' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
