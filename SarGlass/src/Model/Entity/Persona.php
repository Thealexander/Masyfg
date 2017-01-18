<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Persona Entity
 *
 * @property int $Idpersona
 * @property string $Nombresdepersona
 * @property string $ApellidosdePersona
 * @property string $NoCedula
 * @property string $Direccion
 * @property string $Celular
 * @property string $Telefono
 * @property string $Genero
 * @property string $Sexo
 * @property \Cake\I18n\Time $FechadeNacimiento
 * @property string $PaisdeOrigen
 * @property string $Nacionalidad
 * @property string $e-mail
 * @property string|resource $FotodePerfil
 * @property string $tipodeimagen
 * @property string $Estado
 * @property \Cake\I18n\Time $FechadeRegistro
 * @property \Cake\I18n\Time $Fechadeultimaactualizacion
 * @property string $EstadoActual
 *
 * @property \App\Model\Entity\Asistenciapersona[] $asistenciapersonas
 * @property \App\Model\Entity\Club[] $clubs
 * @property \App\Model\Entity\Clubsvoluntario[] $clubsvoluntarios
 * @property \App\Model\Entity\Estudiante[] $estudiantes
 * @property \App\Model\Entity\Horariospersona[] $horariospersonas
 * @property \App\Model\Entity\Pasante[] $pasantes
 * @property \App\Model\Entity\Trabajadore[] $trabajadores
 */
class Persona extends Entity
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
        'Idpersona' => false
    ];
}
