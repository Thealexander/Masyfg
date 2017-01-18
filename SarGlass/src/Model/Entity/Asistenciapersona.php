<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asistenciapersona Entity
 *
 * @property int $persona_id
 * @property string $persona_nombresdepersona
 * @property int $asistencia_id
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Asistencia $asistencia
 */
class Asistenciapersona extends Entity
{

}
