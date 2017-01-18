<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Periodosactividadpersona Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Periodosactividad
 * @property \Cake\ORM\Association\BelongsTo $Personas
 *
 * @method \App\Model\Entity\Periodosactividadpersona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Periodosactividadpersona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Periodosactividadpersona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Periodosactividadpersona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Periodosactividadpersona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Periodosactividadpersona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Periodosactividadpersona findOrCreate($search, callable $callback = null)
 */
class PeriodosactividadpersonaTable extends Table
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

        $this->table('periodosactividadpersona');
        $this->displayField('PeriodoActividad_id');
        $this->primaryKey(['PeriodoActividad_id', 'Persona_id']);

        $this->belongsTo('Periodosactividad', [
            'foreignKey' => 'PeriodoActividad_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'Persona_id',
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
        $rules->add($rules->existsIn(['PeriodoActividad_id'], 'Periodosactividad'));
        $rules->add($rules->existsIn(['Persona_id'], 'Personas'));

        return $rules;
    }
}
