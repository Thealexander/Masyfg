<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pasantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 *
 * @method \App\Model\Entity\Pasante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pasante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pasante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pasante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pasante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pasante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pasante findOrCreate($search, callable $callback = null)
 */
class PasantesTable extends Table
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

        $this->table('pasantes');
        $this->displayField('persona_id');
        $this->primaryKey('persona_id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
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
            ->requirePresence('NombreUniversidad', 'create')
            ->notEmpty('NombreUniversidad');

        $validator
            ->integer('HorasaEjecutar')
            ->allowEmpty('HorasaEjecutar');

        $validator
            ->date('FechadeInicio')
            ->allowEmpty('FechadeInicio');

        $validator
            ->date('FechaFin')
            ->allowEmpty('FechaFin');

        $validator
            ->allowEmpty('idUniversitario');

        $validator
            ->allowEmpty('Descripcion');

        $validator
            ->requirePresence('PeriodoqueCursa', 'create')
            ->notEmpty('PeriodoqueCursa');

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

        return $rules;
    }
}
