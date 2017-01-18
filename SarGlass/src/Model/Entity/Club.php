<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Club Entity
 *
 * @property int $idClub
 * @property string $NombreClub
 * @property \Cake\I18n\Time $FechaApertura
 * @property \Cake\I18n\Time $FechaCierre
 * @property bool $Activo
 * @property int $proyecto_id
 * @property int $persona_id
 *
 * @property \App\Model\Entity\Proyecto $proyecto
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Asistenciavoluntario[] $asistenciavoluntarios
 * @property \App\Model\Entity\Clubsvoluntario[] $clubsvoluntarios
 * @property \App\Model\Entity\Estudiante[] $estudiantes
 */
class Club extends Entity
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
        'idClub' => false
    ];
}
