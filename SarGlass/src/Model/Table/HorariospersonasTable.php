<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horariospersonas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Horarios
 *
 * @method \App\Model\Entity\Horariospersona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Horariospersona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Horariospersona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horariospersona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horariospersona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Horariospersona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horariospersona findOrCreate($search, callable $callback = null)
 */
class HorariospersonasTable extends Table
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

        $this->table('horariospersonas');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id'
        ]);
        $this->belongsTo('Horarios', [
            'foreignKey' => 'horario_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('persona_nombresdepersona');

        return $validator;
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
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));
        $rules->add($rules->existsIn(['horario_id'], 'Horarios'));

        return $rules;
    }
}
