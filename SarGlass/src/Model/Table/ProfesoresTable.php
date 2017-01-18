<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Profesores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Colegios
 *
 * @method \App\Model\Entity\Profesore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Profesore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Profesore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Profesore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Profesore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Profesore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Profesore findOrCreate($search, callable $callback = null)
 */
class ProfesoresTable extends Table
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

        $this->table('profesores');
        $this->displayField('profesor_id');
        $this->primaryKey('profesor_id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'profesor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Colegios', [
            'foreignKey' => 'colegio_id',
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
            ->allowEmpty('Gradoqueimparte');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

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
        $rules->add($rules->existsIn(['profesor_id'], 'Personas'));
        $rules->add($rules->existsIn(['colegio_id'], 'Colegios'));

        return $rules;
    }
}
