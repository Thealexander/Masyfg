<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clubsvoluntarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 * @property \Cake\ORM\Association\BelongsTo $Personas
 *
 * @method \App\Model\Entity\Clubsvoluntario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clubsvoluntario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Clubsvoluntario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clubsvoluntario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clubsvoluntario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clubsvoluntario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clubsvoluntario findOrCreate($search, callable $callback = null)
 */
class ClubsvoluntariosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('clubsvoluntarios');
        $this->displayField('club_id');
        $this->primaryKey(['club_id', 'persona_id']);

        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));

        return $rules;
    }
}
