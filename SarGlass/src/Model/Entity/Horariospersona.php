<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Horariospersona Entity
 *
 * @property int $persona_id
 * @property string $persona_nombresdepersona
 * @property int $horario_id
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Horario $horario
 */
class Horariospersona extends Entity
{

}
