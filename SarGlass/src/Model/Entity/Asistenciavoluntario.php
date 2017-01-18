<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asistenciavoluntario Entity
 *
 * @property int $PeriodosActividad_id
 * @property int $colegio_id
 * @property int $club_id
 * @property int $voluntario_id
 *
 * @property \App\Model\Entity\Asistencia $asistencia
 * @property \App\Model\Entity\Colegio $colegio
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Voluntario $voluntario
 */
class Asistenciavoluntario extends Entity
{

}
