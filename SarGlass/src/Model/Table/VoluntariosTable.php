<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Voluntarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Organizacionesdeorigen
 * @property \Cake\ORM\Association\HasMany $Asistenciavoluntarios
 *
 * @method \App\Model\Entity\Voluntario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Voluntario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Voluntario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Voluntario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Voluntario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Voluntario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Voluntario findOrCreate($search, callable $callback = null)
 */
class VoluntariosTable extends Table
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

        $this->table('voluntarios');
        $this->displayField('voluntario_id');
        $this->primaryKey('voluntario_id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Organizacionesdeorigen', [
            'foreignKey' => 'OrganizaciondeOrigen_id'
        ]);
        $this->hasMany('Asistenciavoluntarios', [
            'foreignKey' => 'voluntario_id'
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
            ->boolean('Activo')
            ->requirePresence('Activo', 'create')
            ->notEmpty('Activo');

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
        $rules->add($rules->existsIn(['OrganizaciondeOrigen_id'], 'Organizacionesdeorigen'));

        return $rules;
    }
}
