<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Trabajadores Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Cargos
 *
 * @method \App\Model\Entity\Trabajadore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Trabajadore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Trabajadore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Trabajadore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Trabajadore findOrCreate($search, callable $callback = null)
 */
class TrabajadoresTable extends Table
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

        $this->table('trabajadores');
        $this->displayField('persona_id');
        $this->primaryKey('persona_id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cargos', [
            'foreignKey' => 'cargo_id',
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
            ->requirePresence('CodigoTrabajador', 'create')
            ->notEmpty('CodigoTrabajador');

        $validator
            ->allowEmpty('Descripcion');

        $validator
            ->numeric('Salario')
            ->allowEmpty('Salario');

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
        $rules->add($rules->existsIn(['cargo_id'], 'Cargos'));

        return $rules;
    }
}
