<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clubs Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Proyectos
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\HasMany $Asistenciavoluntarios
 * @property \Cake\ORM\Association\HasMany $Clubsvoluntarios
 * @property \Cake\ORM\Association\HasMany $Estudiantes
 *
 * @method \App\Model\Entity\Club get($primaryKey, $options = [])
 * @method \App\Model\Entity\Club newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Club[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Club|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Club patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Club[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Club findOrCreate($search, callable $callback = null)
 */
class ClubsTable extends Table
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

        $this->table('clubs');
        $this->displayField('idClub');
        $this->primaryKey('idClub');

        $this->belongsTo('Proyectos', [
            'foreignKey' => 'proyecto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id'
        ]);
        $this->hasMany('Asistenciavoluntarios', [
            'foreignKey' => 'club_id'
        ]);
        $this->hasMany('Clubsvoluntarios', [
            'foreignKey' => 'club_id'
        ]);
        $this->hasMany('Estudiantes', [
            'foreignKey' => 'club_id'
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
            ->integer('idClub')
            ->allowEmpty('idClub', 'create');

        $validator
            ->requirePresence('NombreClub', 'create')
            ->notEmpty('NombreClub');

        $validator
            ->date('FechaApertura')
            ->requirePresence('FechaApertura', 'create')
            ->notEmpty('FechaApertura');

        $validator
            ->date('FechaCierre')
            ->allowEmpty('FechaCierre');

        $validator
            ->boolean('Activo')
            ->allowEmpty('Activo');

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
        $rules->add($rules->existsIn(['proyecto_id'], 'Proyectos'));
        $rules->add($rules->existsIn(['persona_id'], 'Personas'));

        return $rules;
    }
}
