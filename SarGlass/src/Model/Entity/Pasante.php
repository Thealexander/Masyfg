<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pasante Entity
 *
 * @property int $persona_id
 * @property string $NombreUniversidad
 * @property int $HorasaEjecutar
 * @property \Cake\I18n\Time $FechadeInicio
 * @property \Cake\I18n\Time $FechaFin
 * @property string $idUniversitario
 * @property string $Descripcion
 * @property string $PeriodoqueCursa
 *
 * @property \App\Model\Entity\Persona $persona
 */
class Pasante extends Entity
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
        'persona_id' => false
    ];
}
