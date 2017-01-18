<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Proyecto Entity
 *
 * @property int $idProyecto
 * @property string $NombreProyecto
 * @property \Cake\I18n\Time $FechaApertura
 * @property \Cake\I18n\Time $Fechacierre
 * @property int $EmpresaSocia_id
 * @property int $colaborador_id
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Trabajadore $trabajadore
 * @property \App\Model\Entity\Club[] $clubs
 */
class Proyecto extends Entity
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
        'idProyecto' => false
    ];
}
