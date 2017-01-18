<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asistencia Entity
 *
 * @property \Cake\I18n\Time $FechadeInicio
 * @property \Cake\I18n\Time $FechaFin
 * @property int $horario_id
 * @property int $PeriodosActividad_id
 *
 * @property \App\Model\Entity\Horario $horario
 * @property \App\Model\Entity\Periodosactividad $periodosactividad
 * @property \App\Model\Entity\Asistenciapersona[] $asistenciapersonas
 */
class Asistencia extends Entity
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
        'PeriodosActividad_id' => false
    ];
}
