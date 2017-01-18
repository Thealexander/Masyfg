<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tareas Model
 *
 * @method \App\Model\Entity\Tarea get($primaryKey, $options = [])
 * @method \App\Model\Entity\Tarea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Tarea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Tarea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Tarea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Tarea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Tarea findOrCreate($search, callable $callback = null)
 */
class TareasTable extends Table
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

        $this->table('tareas');
        $this->displayField('idtarea');
        $this->primaryKey('idtarea');
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
            ->integer('idtarea')
            ->allowEmpty('idtarea', 'create');

        $validator
            ->requirePresence('Tarea', 'create')
            ->notEmpty('Tarea');

        return $validator;
    }
}
