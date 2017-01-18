<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clubsvoluntario Entity
 *
 * @property int $club_id
 * @property int $persona_id
 *
 * @property \App\Model\Entity\Club $club
 * @property \App\Model\Entity\Persona $persona
 */
class Clubsvoluntario extends Entity
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
        'club_id' => false,
        'persona_id' => false
    ];
}
