<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zutaten Entity
 *
 * @property int $id
 * @property string $name
 * @property string $preis
 * @property string $menge
 * @property string $einheit
 * @property string $alkoholgehalt
 * @property string $beschreibung
 */
class Zutaten extends Entity
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
        'name' => true,
        'preis' => true,
        'menge' => true,
        'einheit' => true,
        'alkoholgehalt' => true,
        'beschreibung' => true,
    ];
}
