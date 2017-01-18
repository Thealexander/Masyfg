<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Horarios Model
 *
 * @property \Cake\ORM\Association\HasMany $Asistencias
 * @property \Cake\ORM\Association\HasMany $Horariospersonas
 *
 * @method \App\Model\Entity\Horario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Horario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Horario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Horario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Horario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Horario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Horario findOrCreate($search, callable $callback = null)
 */
class HorariosTable extends Table
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

        $this->table('horarios');
        $this->displayField('idHorario');
        $this->primaryKey('idHorario');

        $this->hasMany('Asistencias', [
            'foreignKey' => 'horario_id'
        ]);
        $this->hasMany('Horariospersonas', [
            'foreignKey' => 'horario_id'
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
            ->integer('idHorario')
            ->allowEmpty('idHorario', 'create');

        $validator
            ->requirePresence('DiasdelaSemana', 'create')
            ->notEmpty('DiasdelaSemana');

        $validator
            ->time('HoraFin')
            ->requirePresence('HoraFin', 'create')
            ->notEmpty('HoraFin');

        $validator
            ->time('HoraInicio')
            ->requirePresence('HoraInicio', 'create')
            ->notEmpty('HoraInicio');

        $validator
            ->integer('Diastotales')
            ->requirePresence('Diastotales', 'create')
            ->notEmpty('Diastotales');

        $validator
            ->integer('horastotales')
            ->requirePresence('horastotales', 'create')
            ->notEmpty('horastotales');

        $validator
            ->allowEmpty('Comentario');

        return $validator;
    }
}
