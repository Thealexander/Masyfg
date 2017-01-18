<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Asistencias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Horarios
 * @property \Cake\ORM\Association\BelongsTo $Periodosactividad
 * @property \Cake\ORM\Association\HasMany $Asistenciapersonas
 *
 * @method \App\Model\Entity\Asistencia get($primaryKey, $options = [])
 * @method \App\Model\Entity\Asistencia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Asistencia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Asistencia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Asistencia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Asistencia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Asistencia findOrCreate($search, callable $callback = null)
 */
class AsistenciasTable extends Table
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

        $this->table('asistencias');
        $this->displayField('PeriodosActividad_id');
        $this->primaryKey('PeriodosActividad_id');

        $this->belongsTo('Horarios', [
            'foreignKey' => 'horario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Periodosactividad', [
            'foreignKey' => 'PeriodosActividad_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Asistenciapersonas', [
            'foreignKey' => 'asistencia_id'
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
            ->date('FechadeInicio')
            ->requirePresence('FechadeInicio', 'create')
            ->notEmpty('FechadeInicio');

        $validator
            ->dateTime('FechaFin')
            ->allowEmpty('FechaFin');

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
        $rules->add($rules->existsIn(['horario_id'], 'Horarios'));
        $rules->add($rules->existsIn(['PeriodosActividad_id'], 'Periodosactividad'));

        return $rules;
    }
}
