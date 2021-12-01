<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MengenFixture
 */
class MengenFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'mengen';
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
                'menge' => 1.5,
                'rezept_id' => 1,
                'zutat_id' => 1,
            ],
        ];
        parent::init();
    }
}
