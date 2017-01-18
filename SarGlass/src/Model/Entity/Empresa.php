<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $IdEmpresa
 * @property string $NombreEmpresa
 * @property string $NombreContacto
 * @property string $Telefono
 * @property string $Celular
 * @property string $Direccion
 * @property string $DescripcionContacto
 * @property string $emaill
 * @property bool $Activo
 */
class Empresa extends Entity
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
        'IdEmpresa' => false
    ];
}
