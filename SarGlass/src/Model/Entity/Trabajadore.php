<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Trabajadore Entity
 *
 * @property int $persona_id
 * @property string $CodigoTrabajador
 * @property int $cargo_id
 * @property string $Descripcion
 * @property float $Salario
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Cargo $cargo
 */
class Trabajadore extends Entity
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
