<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Periodosactividad Model
 *
 * @method \App\Model\Entity\Periodosactividad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Periodosactividad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Periodosactividad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Periodosactividad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Periodosactividad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Periodosactividad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Periodosactividad findOrCreate($search, callable $callback = null)
 */
class PeriodosactividadTable extends Table
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

        $this->table('periodosactividad');
        $this->displayField('idPeriododeActividad');
        $this->primaryKey('idPeriododeActividad');
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
            ->integer('idPeriododeActividad')
            ->allowEmpty('idPeriododeActividad', 'create');

        $validator
            ->date('FechadeInicio')
            ->requirePresence('FechadeInicio', 'create')
            ->notEmpty('FechadeInicio');

        $validator
            ->date('FechaFin')
            ->requirePresence('FechaFin', 'create')
            ->notEmpty('FechaFin');

        return $validator;
    }
}
