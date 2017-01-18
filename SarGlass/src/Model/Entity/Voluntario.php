<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Voluntario Entity
 *
 * @property int $persona_id
 * @property int $OrganizaciondeOrigen_id
 * @property bool $Activo
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Organizacionesdeorigen $organizacionesdeorigen
 * @property \App\Model\Entity\Asistenciavoluntario[] $asistenciavoluntarios
 */
class Voluntario extends Entity
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
        'voluntario_id' => false
    ];
}
