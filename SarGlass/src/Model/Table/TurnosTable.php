<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Turnos Model
 *
 * @property \Cake\ORM\Association\HasMany $Estudiantes
 *
 * @method \App\Model\Entity\Turno get($primaryKey, $options = [])
 * @method \App\Model\Entity\Turno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Turno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Turno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Turno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Turno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Turno findOrCreate($search, callable $callback = null)
 */
class TurnosTable extends Table
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

        $this->table('turnos');
        $this->displayField('idturno');
        $this->primaryKey('idturno');

        $this->hasMany('Estudiantes', [
            'foreignKey' => 'turno_id'
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
            ->integer('idturno')
            ->allowEmpty('idturno', 'create');

        $validator
            ->requirePresence('Turno', 'create')
            ->notEmpty('Turno');

        return $validator;
    }
}
