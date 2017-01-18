<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Periodosactividadpersona Entity
 *
 * @property int $PeriodoActividad_id
 * @property int $Persona_id
 *
 * @property \App\Model\Entity\Periodosactividad $periodosactividad
 * @property \App\Model\Entity\Persona $persona
 */
class Periodosactividadpersona extends Entity
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
        'PeriodoActividad_id' => false,
        'Persona_id' => false
    ];
}
