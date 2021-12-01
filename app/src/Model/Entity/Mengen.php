<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mengen Entity
 *
 * @property int $id
 * @property string $menge
 * @property int $rezept_id
 * @property int $zutat_id
 *
 * @property \App\Model\Entity\Rezepte[] $rezepte
 * @property \App\Model\Entity\Zutaten $zutaten
 */
class Mengen extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'menge' => true,
        'rezept_id' => true,
        'zutat_id' => true,
        'rezepte' => true,
        'zutaten' => true,
    ];
}
