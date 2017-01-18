<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proyectos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Empresas
 * @property \Cake\ORM\Association\BelongsTo $Trabajadores
 * @property \Cake\ORM\Association\HasMany $Clubs
 *
 * @method \App\Model\Entity\Proyecto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Proyecto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Proyecto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Proyecto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Proyecto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Proyecto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Proyecto findOrCreate($search, callable $callback = null)
 */
class ProyectosTable extends Table
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

        $this->table('proyectos');
        $this->displayField('idProyecto');
        $this->primaryKey('idProyecto');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'EmpresaSocia_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Trabajadores', [
            'foreignKey' => 'colaborador_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Clubs', [
            'foreignKey' => 'proyecto_id'
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
            ->integer('idProyecto')
            ->allowEmpty('idProyecto', 'create');

        $validator
            ->requirePresence('NombreProyecto', 'create')
            ->notEmpty('NombreProyecto');

        $validator
            ->date('FechaApertura')
            ->requirePresence('FechaApertura', 'create')
            ->notEmpty('FechaApertura');

        $validator
            ->date('Fechacierre')
            ->allowEmpty('Fechacierre');

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
        $rules->add($rules->existsIn(['EmpresaSocia_id'], 'Empresas'));
        $rules->add($rules->existsIn(['colaborador_id'], 'Trabajadores'));

        return $rules;
    }
}
