<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Estudiante Entity
 *
 * @property int $persona_id
 * @property string $Grado
 * @property bool $PrimeraVez
 * @property string $NombresTutor
 * @property string $ApellidosTutor
 * @property string $ContactoTutor
 * @property int $CantidadDemiembrosenlafamilia
 * @property string $EsTiemClub
 * @property string $ParConResp
 * @property int $turno_id
 * @property int $club_id
 * @property int $tipodeHogar_id
 * @property int $colegio_id
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Turno $turno
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Tiposdehogar $tiposdehogar
 * @property \App\Model\Entity\Colegio $colegio
 */
class Estudiante extends Entity
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
