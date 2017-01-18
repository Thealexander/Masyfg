<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colegios Model
 *
 * @property \Cake\ORM\Association\HasMany $Asistenciavoluntarios
 * @property \Cake\ORM\Association\HasMany $Estudiantes
 * @property \Cake\ORM\Association\HasMany $Profesores
 *
 * @method \App\Model\Entity\Colegio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Colegio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Colegio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Colegio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Colegio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Colegio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Colegio findOrCreate($search, callable $callback = null)
 */
class ColegiosTable extends Table
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

        $this->table('colegios');
        $this->displayField('IdColegio');
        $this->primaryKey('IdColegio');

        $this->hasMany('Asistenciavoluntarios', [
            'foreignKey' => 'colegio_id'
        ]);
        $this->hasMany('Estudiantes', [
            'foreignKey' => 'colegio_id'
        ]);
        $this->hasMany('Profesores', [
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
            ->integer('IdColegio')
            ->allowEmpty('IdColegio', 'create');

        $validator
            ->requirePresence('NombreDeColegio', 'create')
            ->notEmpty('NombreDeColegio');

        $validator
            ->requirePresence('NombresDirecto', 'create')
            ->notEmpty('NombresDirecto');

        $validator
            ->requirePresence('TelefonoDirector', 'create')
            ->notEmpty('TelefonoDirector');

        $validator
            ->allowEmpty('TelefonoColegio');

        $validator
            ->requirePresence('DireccionColegio', 'create')
            ->notEmpty('DireccionColegio');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
