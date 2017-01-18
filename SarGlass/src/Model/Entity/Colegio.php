<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Colegio Entity
 *
 * @property int $IdColegio
 * @property string $NombreDeColegio
 * @property string $NombresDirecto
 * @property string $TelefonoDirector
 * @property string $TelefonoColegio
 * @property string $DireccionColegio
 * @property string $email
 *
 * @property \App\Model\Entity\Asistenciavoluntario[] $asistenciavoluntarios
 * @property \App\Model\Entity\Estudiante[] $estudiantes
 * @property \App\Model\Entity\Profesore[] $profesores
 */
class Colegio extends Entity
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
        'IdColegio' => false
    ];
}
