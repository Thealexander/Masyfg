<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Turno Entity
 *
 * @property int $idturno
 * @property string $Turno
 *
 * @property \App\Model\Entity\Estudiante[] $estudiantes
 */
class Turno extends Entity
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
        '*' => true,
        'idturno' => false
    ];
}
