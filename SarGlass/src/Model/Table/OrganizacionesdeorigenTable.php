<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Organizacionesdeorigen Model
 *
 * @method \App\Model\Entity\Organizacionesdeorigen get($primaryKey, $options = [])
 * @method \App\Model\Entity\Organizacionesdeorigen newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Organizacionesdeorigen[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Organizacionesdeorigen|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Organizacionesdeorigen patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Organizacionesdeorigen[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Organizacionesdeorigen findOrCreate($search, callable $callback = null)
 */
class OrganizacionesdeorigenTable extends Table
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

        $this->table('organizacionesdeorigen');
        $this->displayField('IdOrganizacion');
        $this->primaryKey('IdOrganizacion');
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
            ->integer('IdOrganizacion')
            ->allowEmpty('IdOrganizacion', 'create');

        $validator
            ->requirePresence('NombreEmpresa', 'create')
            ->notEmpty('NombreEmpresa');

        $validator
            ->allowEmpty('Comentario');

        return $validator;
    }
}
