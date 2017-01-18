<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Profesore Entity
 *
 * @property int $profesor_id
 * @property string $Gradoqueimparte
 * @property string $descripcion
 * @property int $colegio_id
 *
 * @property \App\Model\Entity\Persona $persona
 * @property \App\Model\Entity\Colegio $colegio
 */
class Profesore extends Entity
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
        'profesor_id' => false
    ];
}
