<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estudiantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Personas
 * @property \Cake\ORM\Association\BelongsTo $Turnos
 * @property \Cake\ORM\Association\BelongsTo $Clubs
 * @property \Cake\ORM\Association\BelongsTo $Tiposdehogars
 * @property \Cake\ORM\Association\BelongsTo $Colegios
 *
 * @method \App\Model\Entity\Estudiante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Estudiante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Estudiante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estudiante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Estudiante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Estudiante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estudiante findOrCreate($search, callable $callback = null)
 */
class EstudiantesTable extends Table
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

        $this->table('estudiantes');
        $this->displayField('persona_id');
        $this->primaryKey('persona_id');

        $this->belongsTo('Personas', [
            'foreignKey' => 'persona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Turnos', [
            'foreignKey' => 'turno_id'
        ]);
        $this->belongsTo('Clubs', [
            'foreignKey' => 'club_id'
        ]);
        $this->belongsTo('Tiposdehogars', [
            'foreignKey' => 'tipodeHogar_id'
        ]);
        $this->belongsTo('Colegios', [
            'foreignKey' => 'colegio_id'
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
            ->requirePresence('Grado', 'create')
            ->notEmpty('Grado');

        $validator
            ->boolean('PrimeraVez')
            ->requirePresence('PrimeraVez', 'create')
            ->notEmpty('PrimeraVez');

        $validator
            ->requirePresence('NombresTutor', 'create')
            ->notEmpty('NombresTutor');

        $validator
            ->requirePresence('ApellidosTutor', 'create')
            ->notEmpty('ApellidosTutor');

        $validator
            ->requirePresence('ContactoTutor', 'create')
            ->notEmpty('ContactoTutor');

        $validator
            ->integer('CantidadDemiembrosenlafamilia')
            ->requirePresence('CantidadDemiembrosenlafamilia', 'create')
            ->notEmpty('CantidadDemiembrosenlafamilia');

        $validator
            ->allowEmpty('EsTiemClub');

        $validator
            ->requirePresence('ParConResp', 'create')
            ->notEmpty('ParConResp');

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
        $rules->add($rules->existsIn(['turno_id'], 'Turnos'));
        $rules->add($rules->existsIn(['club_id'], 'Clubs'));
        $rules->add($rules->existsIn(['tipodeHogar_id'], 'Tiposdehogars'));
        $rules->add($rules->existsIn(['colegio_id'], 'Colegios'));

        return $rules;
    }
}
